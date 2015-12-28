<?php

namespace pocketmine\item;

class RawPorkchop extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::RAW_PORKCHOP, $meta, $count, "Raw Porkchop");
	}

        public function isEatable() {
                return true;
        }

}

