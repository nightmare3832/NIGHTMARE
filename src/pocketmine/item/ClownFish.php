<?php

namespace pocketmine\item;


class ClownFish extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::CLOWN_FISH, $meta, $count, "ClownFish");
	}

}
