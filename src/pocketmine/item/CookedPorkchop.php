<?php

namespace pocketmine\item;

class CookedPorkchop extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::COOKED_PORKCHOP, $meta, $count, "Cooked Porkchop");
	}

        public function isEatable() {
                return true;
        }

}

