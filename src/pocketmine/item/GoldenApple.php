<?php

namespace pocketmine\item;

class GoldenApple extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::GOLDEN_APPLE, $meta, $count, "Golden Apple");
	}

	public function isEatable(){
		return true;
	}

}

