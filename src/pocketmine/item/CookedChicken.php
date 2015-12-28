<?php

namespace pocketmine\item;

class CookedChicken extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::COOKED_CHICKEN, $meta, $count, "Cooked Chicken");
	}

        public function isEatable() {
                return true;
        }

}

