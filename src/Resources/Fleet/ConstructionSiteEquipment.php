<?php

namespace Sharemat\Sdk\Resources\Fleet;

use Sharemat\Sdk\Api;

class ConstructionSiteEquipment extends Api
{
    /**
     * Get a collection of ConstructionSiteEquipment.
     *
     * @param array $filters
     * @return array
     */
    public function getConstructionSiteEquipments($filters=[])
    {
        return self::getCollection('/construction_site_equipments' . self::filtersToQueryString($filters));
    }

    /**
     * Get a single ConstructionSiteEquipment by given id.
     *
     * @param int $id
     * @return array
     */
    public function getConstructionSiteEquipment($id)
    {
        return self::getResource('/construction_site_equipments/' . $id);
    }

    /**
     * Create a single ConstructionSiteEquipment.
     *
     * @param array $array
     * @return array
     */
    public function createConstructionSiteEquipment($array)
    {
        return self::createResource('/construction_site_equipments', $array);
    }

    /**
     * Update a single ConstructionSiteEquipment by given id.
     *
     * @param int $id
     * @param array $array
     * @return array
     */
    public function updateConstructionSiteEquipment($id, $array)
    {
        return self::updateResource('/construction_site_equipments/' . $id, $array);
    }

    /**
     * Delete a single ConstructionSiteEquipment by given id.
     *
     * @param int $id
     * @return array
     */
    public function deleteConstructionSiteEquipment($id)
    {
        return self::deleteResource('/construction_site_equipments/' . $id);
    }
}