<?php

namespace pocketmine\item;


class ChainHelmet extends Armor{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::CHAIN_HELMET, $meta, $count, "Chainmail Helmet");
	}
}