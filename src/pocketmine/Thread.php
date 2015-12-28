<?php

namespace pocketmine;

/**
 * This class must be extended by all custom threading classes
 */
abstract class Thread extends \Thread{

	/** @var \ClassLoader */
	protected $classLoader;

	public function getClassLoader(){
		return $this->classLoader;
	}

	public function setClassLoader(\ClassLoader $loader = \null){
		if($loader === \null){
			$loader = Server::getInstance()->getLoader();
		}
		$this->classLoader = $loader;
	}

	public function registerClassLoader(){
		if(!\interface_exists("ClassLoader", \false)){
			require(\pocketmine\PATH . "src/spl/ClassLoader.php");
			require(\pocketmine\PATH . "src/spl/BaseClassLoader.php");
			require(\pocketmine\PATH . "src/pocketmine/CompatibleClassLoader.php");
		}
		if($this->classLoader !== \null){
			$this->classLoader->register(\true);
		}
	}

	public function start($options = PTHREADS_INHERIT_ALL){
		ThreadManager::getInstance()->add($this);

		if(!$this->isRunning() and !$this->isJoined() and !$this->isTerminated()){
			if($this->getClassLoader() === \null){
				$this->setClassLoader();
			}
			return parent::start($options);
		}

		return \false;
	}

	/**
	 * Stops the thread using the best way possible. Try to stop it yourself before calling this.
	 */
	public function quit(){
		if($this->isRunning()){
			$this->kill();
			$this->detach();
		}elseif(!$this->isJoined()){
			if(!$this->isTerminated()){
				$this->join();
			}else{
				$this->kill();
				$this->detach();
			}
		}else{
			$this->detach();
		}

		ThreadManager::getInstance()->remove($this);
	}

	public function getThreadName(){
		return (new \ReflectionClass($this))->getShortName();
	}
}