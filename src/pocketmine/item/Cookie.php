<?php

namespace pocketmine\item;

class Cookie extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::COOKIE, $meta, $count, "Cookie");
	}

        public function isEatable() {
                return true;
        }

}

