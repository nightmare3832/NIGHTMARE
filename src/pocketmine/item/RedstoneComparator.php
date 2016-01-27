<?php

namespace pocketmine\item;

use pocketmine\block\Block;

class RedstoneComparator extends Item{
	public function __construct($meta = 0, $count = 1){
		$this->block = Block::get(Block::UNPOWERED_COMPARATOR);
		parent::__construct(self::REDSTONE_COMPARATOR, $meta, $count, "Redstone Comparator");
	}

}

