<?php

namespace pocketmine\item;

class BakedPotato extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::BAKED_POTATO, $meta, $count, "Baked Potato");
	}
	public function isEatable(){}
	
}