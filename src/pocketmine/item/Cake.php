<?php

namespace pocketmine\item;

use pocketmine\block\Block;

class Cake extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		$this->block = Block::get(Item::CAKE_BLOCK);
		parent::__construct(self::CAKE, 0, $count, "Cake");
	}

	public function getMaxStackSize(){
		return 1;
	}

	public function isEatable() {
		return true;
	}
}
