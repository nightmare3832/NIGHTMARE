<?php

namespace pocketmine\item;


class IronBoots extends Armor{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::IRON_BOOTS, $meta, $count, "Iron Boots");
	}
}