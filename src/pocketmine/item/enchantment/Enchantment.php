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

namespace pocketmine\item\enchantment;


class Enchantment{

	const TYPE_INVALID = -1;

	const TYPE_ARMOR_PROTECTION = 0;
	const TYPE_ARMOR_FIRE_PROTECTION = 1;
	const TYPE_ARMOR_FALL_PROTECTION = 2;
	const TYPE_ARMOR_EXPLOSION_PROTECTION = 3;
	const TYPE_ARMOR_PROJECTILE_PROTECTION = 4;
	const TYPE_ARMOR_THORNS = 5;
	const TYPE_WATER_BREATHING = 6;
	const TYPE_WATER_SPEED = 7;
	const TYPE_WATER_AFFINITY = 8;
	const TYPE_WEAPON_SHARPNESS = 9;
	const TYPE_WEAPON_SMITE = 10;
	const TYPE_WEAPON_ARTHROPODS = 11;
	const TYPE_WEAPON_KNOCKBACK = 12;
	const TYPE_WEAPON_FIRE_ASPECT = 13;
	const TYPE_WEAPON_LOOTING = 14;
	const TYPE_MINING_EFFICIENCY = 15;
	const TYPE_MINING_SILK_TOUCH = 16;
	const TYPE_MINING_DURABILITY = 17;
	const TYPE_MINING_FORTUNE = 18;
	const TYPE_BOW_POWER = 19;
	const TYPE_BOW_KNOCKBACK = 20;
	const TYPE_BOW_FLAME = 21;
	const TYPE_BOW_INFINITY = 22;
	const TYPE_FISHING_FORTUNE = 23;
	const TYPE_FISHING_LURE = 24;

	const RARITY_COMMON = 0;
	const RARITY_UNCOMMON = 1;
	const RARITY_RARE = 2;
	const RARITY_MYTHIC = 3;

	const ACTIVATION_EQUIP = 0;
	const ACTIVATION_HELD = 1;
	const ACTIVATION_SELF = 2;

	const SLOT_NONE = 0;
	const SLOT_ALL = 0b11111111111111;
	const SLOT_ARMOR = 0b1111;
	const SLOT_HEAD = 0b1;
	const SLOT_TORSO = 0b10;
	const SLOT_LEGS = 0b100;
	const SLOT_FEET = 0b1000;
	const SLOT_SWORD = 0b10000;
	const SLOT_BOW = 0b100000;
	const SLOT_TOOL = 0b111000000;
	const SLOT_HOE = 0b1000000;
	const SLOT_SHEARS = 0b10000000;
	const SLOT_FLINT_AND_STEEL = 0b10000000;
	const SLOT_DIG = 0b111000000000;
	const SLOT_AXE = 0b1000000000;
	const SLOT_PICKAXE = 0b10000000000;
	const SLOT_SHOVEL = 0b10000000000;
	const SLOT_FISHING_ROD = 0b100000000000;
	const SLOT_CARROT_STICK = 0b1000000000000;

	/** @var Enchantment[] */
	protected static $enchantments;

	public static function init(){
		self::$enchantments = new \SplFixedArray(256);

		self::$enchantments[self::TYPE_ARMOR_PROTECTION] = new Enchantment(self::TYPE_ARMOR_PROTECTION, "%enchantment.protect.all", self::RARITY_COMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);//0
		self::$enchantments[self::TYPE_ARMOR_FIRE_PROTECTION] = new Enchantment(self::TYPE_ARMOR_FIRE_PROTECTION, "%enchantment.protect.fire", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);//1
		self::$enchantments[self::TYPE_ARMOR_FALL_PROTECTION] = new Enchantment(self::TYPE_ARMOR_FALL_PROTECTION, "%enchantment.protect.fall", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);//2
		self::$enchantments[self::TYPE_ARMOR_EXPLOSION_PROTECTION] = new Enchantment(self::TYPE_ARMOR_EXPLOSION_PROTECTION, "�����ϐ�", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);//3
		self::$enchantments[self::TYPE_ARMOR_PROJECTILE_PROTECTION] = new Enchantment(self::TYPE_ARMOR_PROJECTILE_PROTECTION, "��ѓ���ϐ�", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);//4
		self::$enchantments[self::TYPE_ARMOR_THORNS] = new Enchantment(self::TYPE_ARMOR_THORNS, "���̊Z", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);//5
		self::$enchantments[self::TYPE_WATER_BREATHING] = new Enchantment(self::TYPE_WATER_BREATHING, "�����̌@", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);//6
		self::$enchantments[self::TYPE_WATER_SPEED] = new Enchantment(self::TYPE_WATER_SPEED, "�����ړ�", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);//7
		self::$enchantments[self::TYPE_WATER_AFFINITY] = new Enchantment(self::TYPE_WATER_AFFINITY, "�����ċz", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_ARMOR);//8
		self::$enchantments[self::TYPE_WEAPON_SHARPNESS] = new Enchantment(self::TYPE_WEAPON_SHARPNESS, "�_���[�W����", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_SWORD);//9
		self::$enchantments[self::TYPE_WEAPON_SMITE] = new Enchantment(self::TYPE_WEAPON_SMITE, "������", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_SWORD);//10
		self::$enchantments[self::TYPE_WEAPON_ARTHROPODS] = new Enchantment(self::TYPE_WEAPON_ARTHROPODS, "�A���f�b�g����", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_SWORD);//11
		self::$enchantments[self::TYPE_WEAPON_KNOCKBACK] = new Enchantment(self::TYPE_WEAPON_KNOCKBACK, "�m�b�N�o�b�N", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_SWORD);//12
		self::$enchantments[self::TYPE_WEAPON_FIRE_ASPECT] = new Enchantment(self::TYPE_WEAPON_FIRE_ASPECT, "�Α���", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_SWORD);//13
		self::$enchantments[self::TYPE_WEAPON_LOOTING] = new Enchantment(self::TYPE_WEAPON_LOOTING, "�h���b�v����", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_SWORD);//14
		self::$enchantments[self::TYPE_MINING_EFFICIENCY] = new Enchantment(self::TYPE_MINING_EFFICIENCY, "��������", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_TOOL);//15
		self::$enchantments[self::TYPE_MINING_SILK_TOUCH] = new Enchantment(self::TYPE_MINING_SILK_TOUCH, "�V���N�^�b�`", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_TOOL);//16
		self::$enchantments[self::TYPE_MINING_DURABILITY] = new Enchantment(self::TYPE_MINING_DURABILITY, "�ϋv��", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_TOOL);//17
		self::$enchantments[self::TYPE_MINING_FORTUNE ] = new Enchantment(self::TYPE_MINING_FORTUNE , "�K�^", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_TOOL);//18
		self::$enchantments[self::TYPE_BOW_POWER] = new Enchantment(self::TYPE_BOW_POWER, "�_���[�W����", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_BOW);//19
		self::$enchantments[self::TYPE_BOW_KNOCKBACK] = new Enchantment(self::TYPE_BOW_KNOCKBACK, "�p���`", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_BOW);//20
		self::$enchantments[self::TYPE_BOW_FLAME] = new Enchantment(self::TYPE_BOW_FLAME, "�t���C��", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_BOW);//21
		self::$enchantments[self::TYPE_BOW_INFINITY] = new Enchantment(self::TYPE_BOW_INFINITY, "����", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_BOW);//22
		self::$enchantments[self::TYPE_FISHING_FORTUNE] = new Enchantment(self::TYPE_FISHING_FORTUNE, "�K�^", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_FISHING_ROD);//23
		self::$enchantments[self::TYPE_FISHING_LURE] = new Enchantment(self::TYPE_FISHING_LURE, "�ϋv��", self::RARITY_UNCOMMON, self::ACTIVATION_EQUIP, self::SLOT_FISHING_ROD);//24
	}

	/**
	 * @param int $id
	 * @return $this
	 */
	public static function getEnchantment($id){
		if(isset(self::$enchantments[$id])){
			return clone self::$enchantments[(int) $id];
		}
		return new Enchantment(self::TYPE_INVALID, "unknown", 0, 0, 0);
	}

	public static function getEffectByName($name){
		if(\defined(Enchantment::class . "::TYPE_" . \strtoupper($name))){
			return self::getEnchantment(\constant(Enchantment::class . "::TYPE_" . \strtoupper($name)));
		}
		return \null;
	}

	private $id;
	private $level = 1;
	private $name;
	private $rarity;
	private $activationType;
	private $slot;

	private function __construct($id, $name, $rarity, $activationType, $slot){
		$this->id = (int) $id;
		$this->name = (string) $name;
		$this->rarity = (int) $rarity;
		$this->activationType = (int) $activationType;
		$this->slot = (int) $slot;
	}

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function getRarity(){
		return $this->rarity;
	}

	public function getActivationType(){
		return $this->activationType;
	}

	public function getSlot(){
		return $this->slot;
	}

	public function hasSlot($slot){
		return ($this->slot & $slot) > 0;
	}

	public function getLevel(){
		return $this->level;
	}

	public function setLevel($level){
		$this->level = (int) $level;

		return $this;
	}

}