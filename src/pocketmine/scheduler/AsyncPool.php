<?php

namespace pocketmine\scheduler;

use pocketmine\event\Timings;
use pocketmine\Server;

class AsyncPool{

	/** @var Server */
	private $server;

	protected $size;

	/** @var AsyncTask[] */
	private $tasks = [];
	/** @var int[] */
	private $taskWorkers = [];

	/** @var AsyncWorker[] */
	private $workers = [];
	/** @var int[] */
	private $workerUsage = [];

	public function __construct(Server $server, $size){
		$this->server = $server;
		$this->size = (int) $size;

		for($i = 0; $i < $this->size; ++$i){
			$this->workerUsage[$i] = 0;
			$this->workers[$i] = new AsyncWorker;
			$this->workers[$i]->setClassLoader($this->server->getLoader());
			$this->workers[$i]->start();
		}
	}

	public function getSize(){
		return $this->size;
	}

	public function increaseSize($newSize){
		$newSize = (int) $newSize;
		if($newSize > $this->size){
			for($i = $this->size; $i < $newSize; ++$i){
				$this->workerUsage[$i] = 0;
				$this->workers[$i] = new AsyncWorker;
				$this->workers[$i]->setClassLoader($this->server->getLoader());
				$this->workers[$i]->start();
			}
			$this->size = $newSize;
		}
	}

	public function submitTaskToWorker(AsyncTask $task, $worker){
		if(isset($this->tasks[$task->getTaskId()]) or $task->isGarbage()){
			return;
		}

		$worker = (int) $worker;
		if($worker < 0 or $worker >= $this->size){
			throw new \InvalidArgumentException("Invalid worker $worker");
		}

		$this->tasks[$task->getTaskId()] = $task;

		$this->workers[$worker]->stack($task);
		$this->workerUsage[$worker]++;
		$this->taskWorkers[$task->getTaskId()] = $worker;
	}

	public function submitTask(AsyncTask $task){
		if(isset($this->tasks[$task->getTaskId()]) or $task->isGarbage()){
			return;
		}

		$selectedWorker = \mt_rand(0, $this->size - 1);
		$selectedTasks = $this->workerUsage[$selectedWorker];
		for($i = 0; $i < $this->size; ++$i){
			if($this->workerUsage[$i] < $selectedTasks){
				$selectedWorker = $i;
				$selectedTasks = $this->workerUsage[$i];
			}
		}

		$this->submitTaskToWorker($task, $selectedWorker);
	}

	private function removeTask(AsyncTask $task, $force = \false){
		if(isset($this->taskWorkers[$task->getTaskId()])){
			if(!$force and ($task->isRunning() or !$task->isGarbage())){
				return;
			}
			$this->workers[$w = $this->taskWorkers[$task->getTaskId()]]->unstack($task);
			$this->workerUsage[$w]--;
		}

		unset($this->tasks[$task->getTaskId()]);
		unset($this->taskWorkers[$task->getTaskId()]);

		$task->cleanObject();
	}

	public function removeTasks(){
		do{
			foreach($this->tasks as $task){
				$task->cancelRun();
				$this->removeTask($task);
			}

			if(\count($this->tasks) > 0){
				\usleep(25000);
			}
		}while(\count($this->tasks) > 0);

		for($i = 0; $i < $this->size; ++$i){
			$this->workerUsage[$i] = 0;
		}

		$this->taskWorkers = [];
		$this->tasks = [];
	}

	public function collectTasks(){
		Timings::$schedulerAsyncTimer->startTiming();

		foreach($this->tasks as $task){
			if($task->isGarbage() and !$task->isRunning()){

				if(!$task->hasCancelledRun()){
					$task->onCompletion($this->server);
				}

				$this->removeTask($task);
			}elseif($task->isTerminated()){
				$info = $task->getTerminationInfo();
				$this->removeTask($task, \true);
				$this->server->getLogger()->critical("Could not execute asynchronous task " . (new \ReflectionClass($task))->getShortName() . ": " . (isset($info["message"]) ? $info["message"] : "Unknown"));
				$this->server->getLogger()->critical("On ".$info["scope"].", line ".$info["line"] .", ".$info["function"]."()");
			}
		}

		Timings::$schedulerAsyncTimer->stopTiming();
	}
}
