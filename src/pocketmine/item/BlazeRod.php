<?php

namespace pocketmine\item;

class BlazeRod extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::BLAZE_ROD, $meta, $count, "Blaze Rod");
	}

}

