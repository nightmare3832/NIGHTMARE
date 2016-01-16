<?php

namespace pocketmine\updater;

use pocketmine\Player;
use pocketmine\Server;
use pocketmine\utils\TextFormat;
use pocketmine\utils\Utils;
use pocketmine\utils\VersionString;

class AutoUpdater{

	/** @var Server */
	protected $server;
	protected $endpoint;
	protected $hasUpdate = \false;
	protected $updateInfo = \null;

	public function __construct(Server $server, $endpoint){
		$this->server = $server;
		$this->endpoint = "http://$endpoint/api/";

		if($server->getProperty("auto-updater.enabled", \true)){
			$this->check();
			if($this->hasUpdate()){
				if($this->server->getProperty("auto-updater.on-update.warn-console", \true)){
					$this->showConsoleUpdate();
				}
			}elseif($this->server->getProperty("auto-updater.preferred-channel", \true)){
				$version = new VersionString();
				if(!$version->isDev() and $this->getChannel() !== "stable"){
					$this->showChannelSuggestionStable();
				}elseif($version->isDev() and $this->getChannel() === "stable"){
					$this->showChannelSuggestionBeta();
				}
			}
		}
	}

	protected function check(){
		$response = Utils::getURL($this->endpoint . "?channel=" . $this->getChannel(), 4);
		$response = \json_decode($response, \true);
		if(!\is_array($response)){
			return;
		}

		$this->updateInfo = [
			"version" => $response["version"],
			"api_version" => $response["api_version"],
			"build" => $response["build"],
			"date" => $response["date"],
			"details_url" => isset($response["details_url"]) ? $response["details_url"] : \null,
			"download_url" => $response["download_url"]
		];

		$this->checkUpdate();
	}

	/**
	 * @return bool
	 */
	public function hasUpdate(){
		return $this->hasUpdate;
	}

	public function showConsoleUpdate(){
	}

	public function showPlayerUpdate(Player $player){
	}

	protected function showChannelSuggestionStable(){
	}

	protected function showChannelSuggestionBeta(){
	}

	public function getUpdateInfo(){
		return $this->updateInfo;
	}

	public function doCheck(){
		$this->check();
	}

	protected function checkUpdate(){
		if($this->updateInfo === \null){
			return;
		}
		$currentVersion = new VersionString($this->server->getPocketMineVersion());
		$newVersion = new VersionString($this->updateInfo["version"]);

		if($currentVersion->compare($newVersion) > 0 and ($currentVersion->get() !== $newVersion->get() or $currentVersion->getBuild() > 0)){
			$this->hasUpdate = \true;
		}else{
			$this->hasUpdate = \false;
		}

	}

	public function getChannel(){
		$channel = \strtolower($this->server->getProperty("auto-updater.preferred-channel", "stable"));
		if($channel !== "stable" and $channel !== "beta" and $channel !== "development"){
			$channel = "stable";
		}

		return $channel;
	}
}