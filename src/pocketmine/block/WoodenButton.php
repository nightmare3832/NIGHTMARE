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

class WoodenButton extends Flowable{

	protected $id = self::WOODEN_BUTTON;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		return "Wooden Button";
	}

	public function getHardness(){
		return 0.5;
	}

	public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = \null){
		$faces = [
			1 => 1,
			2 => 2,
			3 => 3,
			4 => 4,
			5 => 5,
		];
		$this->meta = $faces[$face];
		$this->getLevel()->setBlock($block, $this, true, true);
		return true;
	}

	public function onActivate(Item $item, Player $player = null){
		if(($player instanceof Player && !$player->isSneaking())||$player===null){
			$this->getLevel()->scheduleUpdate($this, 15);
		}
	}

	public function getDrops(Item $item){
		return [143, 0, 1];
	}
}