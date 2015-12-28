<?php

namespace pocketmine\item;


class Potion extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::POTION, 0, $count, "Potion");
	}

	public function getMaxStackSize(){
		return 1;
	}

}