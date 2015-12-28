<?php

namespace pocketmine\item;

class RawRabbit extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::RAW_RABBIT, $meta, $count, "Raw Rabbit");
	}

	public function isEatable(){
		return true;
	}
}

