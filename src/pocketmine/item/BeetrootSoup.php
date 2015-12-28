<?php

namespace pocketmine\item;


class BeetrootSoup extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::BEETROOT_SOUP, 0, $count, "Beetroot Soup");
	}

	public function getMaxStackSize(){
		return 1;
	}
	public function isEatable() {
		return true;
	}	
}
