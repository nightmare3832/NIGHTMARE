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

namespace pocketmine\network\protocol;

use pocketmine\utils\Binary;











class FullChunkDataPacket extends DataPacket{
	const NETWORK_ID = Info::FULL_CHUNK_DATA_PACKET;
	
	const ORDER_COLUMNS = 0;
	const ORDER_LAYERED = 1;

	public $chunkX;
	public $chunkZ;
	public $order = self::ORDER_COLUMNS;
	public $data;

	public function decode(){

	}

	public function encode(){
		$this->buffer = \chr(self::NETWORK_ID); $this->offset = 0;;
        $this->buffer .= \pack("N", $this->chunkX);
        $this->buffer .= \pack("N", $this->chunkZ);
        $this->buffer .= \chr($this->order);
		$this->buffer .= \pack("N", \strlen($this->data));
		$this->buffer .= $this->data;
	}

}
