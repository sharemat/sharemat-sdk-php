<?php

namespace Sharemat\Sdk\Resources\Account;

use Sharemat\Sdk\Api;

class Organization extends Api
{
    /**
     * Get a collection of Organization.
     *
     * @return array
     */
    public function getOrganizations()
    {
        return self::getCollection('/organizations');
    }
    
    /**
     * Get a single Organization by given id.
     *
     * @param int $id
     * @return array
     */
    public function getOrganization($id)
    {
        return self::getResource('/organizations/' . $id);
    }

    /**
     * Update a single Organization by given id.
     *
     * @param int $id
     * @param array $array
     * @return array
     */
    public function updateOrganization($id, $array)
    {
        return self::updateResource('/organizations/' . $id, $array);
    }
}