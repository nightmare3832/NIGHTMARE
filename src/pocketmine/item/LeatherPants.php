<?php

namespace pocketmine\item;


class LeatherPants extends Armor{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::LEATHER_PANTS, $meta, $count, "Leather Pants");
	}
}