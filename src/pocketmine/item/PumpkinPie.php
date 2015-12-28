<?php

namespace pocketmine\item;

class PumpkinPie extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::PUMPKIN_PIE, $meta, $count, "Pumpkin Pie");
	}

        public function isEatable() {
                return true;
        }

}

