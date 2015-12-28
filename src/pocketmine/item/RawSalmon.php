<?php

namespace pocketmine\item;


class RawSalmon extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::RAW_SALMON, $meta, $count, "Raw Salmon");
	}

}
