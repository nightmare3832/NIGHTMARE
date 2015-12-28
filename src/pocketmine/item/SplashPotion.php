<?php

namespace pocketmine\item;


class SplashPotion extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::SPLASH_POTION, 0, $count, "Splash Potion");
	}

	public function getMaxStackSize(){
		return 1;
	}

}