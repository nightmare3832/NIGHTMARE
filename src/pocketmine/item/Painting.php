<?php

namespace pocketmine\item;

use pocketmine\block\Block;
use pocketmine\level\Level;
use pocketmine\Player;
use pocketmine\entity\Painting as PaintingEntity;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\nbt\tag\EnumTag;
use pocketmine\nbt\tag\StringTag;
use pocketmine\nbt\tag\DoubleTag;
use pocketmine\nbt\tag\FloatTag;


class Painting extends Item{
	public function __construct($meta = 0, $count = 1){
		parent::__construct(self::PAINTING, 0, $count, "Painting");
	}

	public function canBeActivated(){
		return true;
	}

	public function onActivate(Level $level, Player $player, Block $block, Block $target, $face, $fx, $fy, $fz){
		if($target->isTransparent() === false and $face > 1 and $block->isSolid() === false){
			$faces = [
				2 => 1,
				3 => 3,
				4 => 0,
				5 => 2,

			];
			$motives = [
				// Motive Width Height
				["Kebab", 1, 1],
				["Aztec", 1, 1],
				["Alban", 1, 1],
				["Aztec2", 1, 1],
				["Bomb", 1, 1],
				["Plant", 1, 1],
				["Wasteland", 1, 1],
				["Wanderer", 1, 2],
				["Graham", 1, 2],
				["Pool", 2, 1],
				["Courbet", 2, 1],
				["Sunset", 2, 1],
				["Sea", 2, 1],
				["Creebet", 2, 1],
				["Match", 2, 2],
				["Bust", 2, 2],
				["Stage", 2, 2],
				["Void", 2, 2],
				["SkullAndRoses", 2, 2],
				//array("Wither", 2, 2),
				["Fighters", 4, 2],
				["Skeleton", 4, 3],
				["DonkeyKong", 4, 3],
				["Pointer", 4, 4],
				["Pigscene", 4, 4],
				["Flaming Skull", 4, 4],
			];

			$motive = $motives[mt_rand(0, count($motives) - 1)];
			$data = [
				"x" => $target->x,
				"y" => $target->y,
				"z" => $target->z,
				"yaw" => $faces[$face] * 90,
				"Motive" => $motive[0],
			];
			
			$nbt = new CompoundTag("", [
				"Motive" => new StringTag("Motive", $data["Motive"]),
				"Pos" => new EnumTag("Pos", [
					new DoubleTag("", $data["x"]),
					new DoubleTag("", $data["y"]),
					new DoubleTag("", $data["z"])
				]),
				"Motion" => new EnumTag("Motion", [
					new DoubleTag("", 0),
					new DoubleTag("", 0),
					new DoubleTag("", 0)
				]),
				"Rotation" => new EnumTag("Rotation", [
					new FloatTag("", $data["yaw"]),
					new FloatTag("", 0)
				]),
			]);
			
			$painting = new PaintingEntity($player->getLevel()->getChunk($block->getX() >> 4, $block->getZ() >> 4), $nbt);
			$painting->spawnToAll();
			
			if($player->isSurvival()){
				$item = $player->getInventory()->getItemInHand();
				$count = $item->getCount();
				if(--$count <= 0){
					$player->getInventory()->setItemInHand(Item::get(Item::AIR));
					return;
				}
				$item->setCount($count);
				$player->getInventory()->setItemInHand($item);
			}
			return true;
		}

		return false;
	}

}