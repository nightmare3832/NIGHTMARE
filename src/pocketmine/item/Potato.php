<?php

namespace pocketmine\item;

use pocketmine\block\Block;

class Potato extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		$this->block = Block::get(Item::POTATO_BLOCK);
		parent::__construct(self::POTATO, 0, $count, "Potato");
	}

        public function isEatable() {
                return true;
        }

}
