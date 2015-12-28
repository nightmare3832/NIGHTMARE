<?php

namespace pocketmine\item;


class RottenFlesh extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::ROTTEN_FLESH, 0, $count, "Rotten Flesh");
	}
	public function isEatable() {
		return true;
	}
	
}
