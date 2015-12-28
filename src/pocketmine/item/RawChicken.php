<?php

namespace pocketmine\item;

class RawChicken extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::RAW_CHICKEN, $meta, $count, "Raw Chicken");
	}

        public function isEatable() {
                return true;
        }

}

