<?php

namespace pocketmine\item;


class ChainLeggings extends Armor{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::CHAIN_LEGGINGS, $meta, $count, "Chain Leggings");
	}
}