<?php

namespace pocketmine\item;


class GoldBoots extends Armor{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::GOLD_BOOTS, $meta, $count, "Gold Boots");
	}
}