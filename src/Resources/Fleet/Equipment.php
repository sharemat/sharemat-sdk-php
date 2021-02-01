<?php

namespace Sharemat\Sdk\Resources\Fleet;

use Sharemat\Sdk\Api;

class Equipment extends Api
{
    /**
     * Get a collection of Equipment.
     *
     * @param array $filters
     * @return array
     */
    public function getEquipments($filters=[])
    {
        return self::getCollection('/equipment' . self::filtersToQueryString($filters));
    }

    /**
     * Get a single Equipment by given id.filtersToQueryString($filters):
     *
     * @param int $id
     * @return array
     */
    public function getEquipment($id)
    {
        return self::getResource('/equipment/' . $id);
    }

    /**
     * Create a single Equipment.
     *
     * @param array $array
     * @return array
     */
    public function createEquipment($array)
    {
        return self::createResource('/equipment', $array);
    }

    /**
     * Update or Create multiple Equipments.
     *
     * @param array $array
     * @return array
     */
    public function upsertEquipments($array)
    {
        return self::createResource('/equipment/upsert', $array);
    }

    /**
     * Update a single Equipment by given id.
     *
     * @param int $id
     * @param array $array
     * @return array
     */
    public function updateEquipment($id, $array)
    {
        return self::updateResource('/equipment/' . $id, $array);
    }

    /**
     * Delete a single Equipment by given id.
     *
     * @param int $id
     * @return array
     */
    public function deleteEquipment($id)
    {
        return self::deleteResource('/equipment/' . $id);
    }
}