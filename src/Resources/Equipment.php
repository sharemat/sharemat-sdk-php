<?php

namespace Sharemat\Sdk\Resources;

use Sharemat\Sdk\Api;

class Equipment extends Api
{
    /**
     * A collection of Equipment.
     *
     * @return array
     */
    public function getEquipments()
    {
        return self::getCollection('/equipments');
    }
    
    /**
     * A single Equipment by given id.
     *
     * @param int $id equipment_id
     * @return array
     */
    public function getEquipment($id)
    {
        return self::getResource('/equipments/' . $id);
    }
}