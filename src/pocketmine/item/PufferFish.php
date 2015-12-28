<?php

namespace pocketmine\item;


class PufferFish extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::PUFFER_FISH, $meta, $count, "Pufferfish");
	}

}
