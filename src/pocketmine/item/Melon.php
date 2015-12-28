<?php

namespace pocketmine\item;

class Melon extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::MELON, $meta, $count, "Melon");
	}

        public function isEatable() {
                return true;
        }

}

