<?php

namespace pocketmine\item;


class ChainChestplate extends Armor{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::CHAIN_CHESTPLATE, $meta, $count, "Chain Chestplate");
	}
}