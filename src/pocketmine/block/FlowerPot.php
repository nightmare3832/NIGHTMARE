<?php

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\math\AxisAlignedBB;
use pocketmine\nbt\NBT;
use pocketmine\nbt\tag\Compound;
use pocketmine\nbt\tag\Enum;
use pocketmine\nbt\tag\Int;
use pocketmine\nbt\tag\String;
use pocketmine\Player;
use pocketmine\tile\FlowerPot as Pot;
use pocketmine\tile\Tile;

class FlowerPot extends Transparent{

	protected $id = self::FLOWER_POT_BLOCK;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		return "Flower Pot Block";
	}

}