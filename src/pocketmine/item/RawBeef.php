<?php

namespace pocketmine\item;

class RawBeef extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::RAW_BEEF, $meta, $count, "Raw Beef");
	}

        public function isEatable() {
                return true;
        }

}

