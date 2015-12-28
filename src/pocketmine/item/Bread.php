<?php

namespace pocketmine\item;

class Bread extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::BREAD, $meta, $count, "Bread");
	}
	public function isEatable() {
		return true;
	}	
}
