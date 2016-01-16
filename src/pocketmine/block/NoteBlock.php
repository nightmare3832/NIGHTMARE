<?php

/*
 *
 *  ____            _        _   __  __ _                  __  __ ____
 * |  _ \ ___   ___| | _____| |_|  \/  (_)_ __   ___      |  \/  |  _ \
 * | |_) / _ \ / __| |/ / _ \ __| |\/| | | '_ \ / _ \_____| |\/| | |_) |
 * |  __/ (_) | (__|   <  __/ |_| |  | | | | | |  __/_____| |  | |  __/
 * |_|   \___/ \___|_|\_\___|\__|_|  |_|_|_| |_|\___|     |_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author PocketMine Team
 * @link http://www.pocketmine.net/
 *
 *
*/

namespace pocketmine\block;

use pocketmine\item\Item;
use pocketmine\item\Tool;
use pocketmine\level\sound\NoteblockSound;
use pocketmine\Player;

class NoteBlock extends Transparent{

	protected $id = self::NOTE_BLOCK;

	public function __construct($meta = 0){
		$this->meta = $meta;
	}

	public function getName(){
		return "Note Block";
	}

	public function getHardness(){
		return 0.5;
	}

	public function getInstrument(){
		$down = $this->getSide(Vector3::SIDE_DOWN);
		switch($down->getId()){
			case self::WOODEN_PLANK:
			case self::NOTEBLOCK:
			case self::CRAFTING_TABLE:
				return NoteblockSound::INSTRUMENT_BASS;
			break;
			case self::SAND:
			case self::SANDSTONE:
			case self::SOUL_SAND:
				return NoteblockSound::INSTRUMENT_TABOUR;
			break;
			case self::GLASS:
			case self::GLASS_PANEL:
			case self::GLOWSTONE_BLOCK:
				return NoteblockSound::INSTRUMENT_CLICK;
			break;
			case self::COAL_ORE:
			case self::DIAMOND_ORE:
			case self::EMERALD_ORE:
			case self::GLOWING_REDSTONE_ORE:
			case self::GOLD_ORE:
			case self::IRON_ORE:
			case self::LAPIS_ORE:
			case self::LIT_REDSTONE_ORE:
			case self::NETHER_QUARTZ_ORE:
			case self::REDSTONE_ORE:
				return NoteblockSound::INSTRUMENT_BASS_DRUM;
			break;
			default:
				return NoteblockSound::INSTRUMENT_PIANO;
			break;
		}
	}

	public function getPitch(){
		if($this->meta < 24){
			$this->meta ++;
		}else{
			$this->meta = 0;
		}
		$this->getLevel()->setBlock($this, $this);
		return $this->meta * 1;
	}

	public function onActivate(Item $item, Player $player = null){
		$this->getLevel()->addSound(new NoteblockSound($this, $this->getInstrument(), $this->getPitch()));
		return true;
	}

	public function getDrops(Item $item){
		return [];
	}
}
