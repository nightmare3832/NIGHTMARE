<?php

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\level\Level;
use pocketmine\math\Vector3;
use pocketmine\Player;
use pocketmine\tile\Tile;
use pocketmine\math\AxisAlignedBB;
use pocketmine\nbt\tag\String;
use pocketmine\nbt\tag\Int;
use pocketmine\nbt\tag\Compound;
use pocketmine\tile\FlowerPot as FlowerPotTile;

class FlowerPot extends Flowable{

	protected $id = Block::FLOWER_POT_BLOCK;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function canBeActivated(){
		return true;
	}

	public function canBeFlowedInto(){
		return true;
	}

	public function getHardness(){
		return 0;
	}

	public function isSolid(){
		return false;
	}

	public function getName(){
		return "Flower Pot";
	}

	public function getBoundingBox(){
		return new AxisAlignedBB(
			$this->x - 0.6875,
			$this->y - 0.375,
			$this->z - 0.6875,
			$this->x + 0.6875,
			$this->y + 0.375,
			$this->z + 0.6875
		);
	}

	public function place(Item $item, Block $block, Block $target, $face, $fx, $fy, $fz, Player $player = null){
		if($this->getSide(Vector3::SIDE_DOWN)->isTransparent() === false){
			$this->getLevel()->setBlock($block, $this, true, true);
			$nbt = new Compound("", [
				new String("id", Tile::FLOWER_POT),
				new Int("x", $block->x),
				new Int("y", $block->y),
				new Int("z", $block->z),
				new Int("item", 0),
				new Int("data", 0),
			]);
			$pot = Tile::createTile("FlowerPot", $this->getLevel()->getChunk($this->x >> 4, $this->z >> 4), $nbt);
			return true;
		}
		return false;
	}

	public function onActivate(Item $item, Player $player = null){
		$tile = $this->getLevel()->getTile($this);
		if($tile instanceof FlowerPotTile){
			if($tile->getFlowerPotItem() === Item::AIR){
				switch($item->getId()){
					case Item::TALL_GRASS:
						if($item->getDamage() === 1){
							break;
						}
					case Item::SAPLING:
					case Item::DEAD_BUSH:
					case Item::DANDELION:
					case Item::RED_FLOWER:
					case Item::BROWN_MUSHROOM:
					case Item::RED_MUSHROOM:
					case Item::CACTUS:
						$tile->setFlowerPotData($item->getId(), $item->getDamage());
						$this->setDamage($item->getDamage());
						if($player->isSurvival()){
							$item->count--;
						}
						return true;
					break;
				}
			}
		}
		return false;
	}

	public function onUpdate($type){
		if($type === Level::BLOCK_UPDATE_NORMAL){
			if($this->getSide(Vector3::SIDE_DOWN)->getId() === Item::AIR){
				$this->getLevel()->useBreakOn($this);
				return Level::BLOCK_UPDATE_NORMAL;
			}
		}
		return false;
	}

	public function getDrops(Item $item){
		$items = array([Item::FLOWER_POT, 0, 1]);
		if(($tile = $this->getLevel()->getTile($this)) instanceof FlowerPotTile){
			if($tile->getFlowerPotItem() !== Item::AIR){
				$items[] = array($tile->getFlowerPotItem(), $tile->getFlowerPotData(), 1);
			}
		}
		return $items;
	}
}