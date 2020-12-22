<?php

namespace Sharemat\Sdk\Resources\Account;

use Sharemat\Sdk\Api;

class Site extends Api
{
    /**
     * Get a collection of Site.
     *
     * @return array
     */
    public function getSites()
    {
        return self::getCollection('/sites');
    }
    
    /**
     * Get a single Site by given id.
     *
     * @param int $id
     * @return array
     */
    public function getSite($id)
    {
        return self::getResource('/sites/' . $id);
    }

    /**
     * Create a single Site.
     *
     * @param array $array
     * @return array
     */
    public function createSite($array)
    {
        return self::createResource('/sites', $array);
    }

    /**
     * Upsert a Site or a Region.
     *
     * @param array $array
     * @return array
     */
    public function upsertRegionSite($array)
    {
        return self::createResource('/sites/upsert', $array);
    }

    /**
     * Update a single Site by given id.
     *
     * @param int $id
     * @param array $array
     * @return array
     */
    public function updateSite($id, $array)
    {
        return self::updateResource('/sites/' . $id, $array);
    }

    /**
     * Delete a single Site by given id.
     *
     * @param int $id
     * @return array
     */
    public function deleteSite($id)
    {
        return self::deleteResource('/sites/' . $id);
    }
}