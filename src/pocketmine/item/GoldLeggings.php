<?php

namespace pocketmine\item;


class GoldLeggings extends Armor{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::GOLD_LEGGINGS, $meta, $count, "Gold Leggings");
	}
}