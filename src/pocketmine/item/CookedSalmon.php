<?php

namespace pocketmine\item;


class CookedSalmon extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::COOKED_SALMON, $meta, $count, "Cooked Salmon");
	}
}
