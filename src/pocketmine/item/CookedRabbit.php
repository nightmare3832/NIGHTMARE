<?php

namespace pocketmine\item;

class CookedRabbit extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::COOKED_RABBIT, $meta, $count, "Cooked Rabbit");
	}

	public function isEatable(){
		return true;
	}
}

