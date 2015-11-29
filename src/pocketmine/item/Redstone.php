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

namespace pocketmine\item;

class Redstone extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::REDSTONE, $meta, $count, "Redstone");
	}

	public function onActivate(Level $level, Player $player, Block $block, Block $target, $face, $fx, $fy, $fz){
		$targetBlock = Block::get($this->meta);

		if($targetBlock instanceof Air){
			if($target instanceof Liquid and $target->getDamage() === 0){
				$result = clone $this;
				$result->setDamage(0);
				if(!$ev->isCancelled()){
					$player->getLevel()->setBlock($target, new Air(), \true, \true);
					if($player->isSurvival()){
						$player->getInventory()->setItemInHand($ev->getItem(), $player);
					}
					return \true;
				}else{
					$player->getInventory()->sendContents($player);
				}
			}
		}elseif($targetBlock instanceof Liquid){
			$result = clone $this;
			$result->setDamage(0);
			if(!$ev->isCancelled()){
				$player->getLevel()->setBlock(55, $targetBlock, \true, \true);
				if($player->isSurvival()){
					$player->getInventory()->setItemInHand($ev->getItem(), $player);
				}
				return \true;
			}else{
				$player->getInventory()->sendContents($player);
			}
		}
	}
}

