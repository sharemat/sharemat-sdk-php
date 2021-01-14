<?php

namespace Sharemat\Sdk\Resources\Fleet;

use Sharemat\Sdk\Api;

class EquipmentConfiguration extends Api
{
    /**
     * Update or Create multiple EquipmentConfigurations.
     *
     * @param array $array
     * @return array
     */
    public function upsertEquipmentConfigurations($array)
    {
        return self::createResource('/equipment_configuration/upsert', $array);
    }
}