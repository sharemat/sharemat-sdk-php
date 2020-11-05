<?php

namespace Sharemat\Sdk\Resources\Account;

use Sharemat\Sdk\Api;

class Region extends Api
{
    /**
     * Get a collection of Region.
     *
     * @return array
     */
    public function getRegions()
    {
        return self::getCollection('/regions');
    }
    
    /**
     * Get a single Region by given id.
     *
     * @param int $id
     * @return array
     */
    public function getRegion($id)
    {
        return self::getResource('/regions/' . $id);
    }

    /**
     * Create a single Region.
     *
     * @param array $array
     * @return array
     */
    public function createRegion($array)
    {
        return self::createResource('/regions', $array);
    }

    /**
     * Update a single Region by given id.
     *
     * @param int $id
     * @param array $array
     * @return array
     */
    public function updateRegion($id, $array)
    {
        return self::updateResource('/regions/' . $id, $array);
    }

    /**
     * Delete a single Region by given id.
     *
     * @param int $id
     * @return array
     */
    public function deleteRegion($id)
    {
        return self::deleteResource('/regions/' . $id);
    }
}