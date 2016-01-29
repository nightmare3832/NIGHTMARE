<?php

namespace pocketmine\item;

use pocketmine\block\Block;

class Hopper extends Item{
	public function __construct($meta = 0, $count = 1){
		$this->block = Block::get(Block::HOPPER);
		parent::__construct(self::HOPPER, $meta, $count, "Hopper");
	}

}

