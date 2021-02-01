<?php

namespace Sharemat\Sdk\Resources\Fleet;

use Sharemat\Sdk\Api;

class ConstructionSite extends Api
{
    /**
     * Get a collection of ConstructionSite.
     *
     * @param array $filters
     * @return array
     */
    public function getConstructionSites($filters=[])
    {
        return self::getCollection('/construction_sites');
    }

    /**
     * Get a single ConstructionSite by given id.
     *
     * @param int $id
     * @return array
     */
    public function getConstructionSite($id)
    {
        return self::getResource('/construction_sites/' . $id);
    }

    /**
     * Create a single ConstructionSite.
     *
     * @param array $array
     * @return array
     */
    public function createConstructionSite($array)
    {
        return self::createResource('/construction_sites', $array);
    }

    /**
     * Update a single ConstructionSite by given id.
     *
     * @param int $id
     * @param array $array
     * @return array
     */
    public function updateConstructionSite($id, $array)
    {
        return self::updateResource('/construction_sites/' . $id, $array);
    }

    /**
     * Delete a single ConstructionSite by given id.
     *
     * @param int $id
     * @return array
     */
    public function deleteConstructionSite($id)
    {
        return self::deleteResource('/construction_sites/' . $id);
    }
}