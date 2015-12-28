<?php

namespace pocketmine\item;


class Fish extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::RAW_FISH, $meta, $count, "Raw Fish");
		if($meta === 1){
			$this->name = "Raw Salmon";
		}elseif($meta === 2){
			$this->name = "Clownfish";
		}elseif($meta === 3){
			$this->name = "Pufferfish";
		}
	}

    public function isEatable() {
        return true;
    }

}
