<?php

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\Player;

class UnpoweredRedstoneRepeater extends Solid{

	protected $id = self::UNPOWERED_REPEATER;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		return "Redstone Repeater";
	}

	public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = \null){
		$faces = [
			0 => 1,
			1 => 2,
			2 => 3,
			3 => 0,
		];
		$this->meta = $faces[$player instanceof Player ? $player->getDirection() : 0];
		$this->getLevel()->setBlock($block, $this, \true, \true);
		return \true;
	}

	public function getDrops(Item $item){
		return [$this->id, $this->meta, 1];
	}
}