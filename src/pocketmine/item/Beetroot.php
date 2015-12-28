<?php

namespace pocketmine\item;

class Beetroot extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::BEETROOT, $meta, $count, "Beetroot");
	}
	public function isEatable() {
		return true;
	}
	
}
