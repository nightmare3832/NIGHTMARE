<?php

namespace pocketmine\item;


class MushroomStew extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::MUSHROOM_STEW, 0, $count, "Mushroom Stew");
	}

	public function getMaxStackSize(){
		return 1;
	}

        public function isEatable() {
                return true;
        }

}
