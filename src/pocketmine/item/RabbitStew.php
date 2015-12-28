<?php

namespace pocketmine\item;


class RabbitStew extends Item implements Food{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::RABBIT_STEW, 0, $count, "Rabbit Stew");
	}
	public function isEatable(){}
	
}