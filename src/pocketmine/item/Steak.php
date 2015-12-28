<?php

namespace pocketmine\item;

class Steak extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::STEAK, $meta, $count, "Steak");
	}
	public function isEatable() {
		return true;
	}
	
}
