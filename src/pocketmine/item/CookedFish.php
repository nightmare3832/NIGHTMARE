<?php

namespace pocketmine\item;


class CookedFish extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::COOKED_FISH, $meta, $count, "Cooked Fish");
		if($meta === 1){
			$this->name = "Cooked Salmon";
		}
	}

        public function isEatable() {
                return true;
        }

}
