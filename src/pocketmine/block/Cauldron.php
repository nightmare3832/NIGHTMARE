<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____  
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \ 
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/ 
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_| 
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 * 
 *
*/

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\Player;

class Cauldron extends Solid{

	protected $id = self::CAULDRON;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		return "Cauldron";
	}

	public function getDrops(Item $item){
		return [$this->id, $this->meta, 1];
	}

	public function onActivate(Item $item, Player $player = null){
		$tile = $this->getLevel()->getTile($this);
			if(this->meta == 0){
				switch($item->getId()){
					case Item::BUCKET:
						if($item->getDamage() === 8){
							$this->setDamage(6);
							$this->getLevel()->setBlock($this, $this, true, false);
								if($player->isSurvival()){
									$item->setDamage(0);
									$player->getInventory()->setItemInHand($item(), $player);
								}
						}
					break;
				}
			}
		}
		return false;
	}
}

