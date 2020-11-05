<?php

namespace Sharemat\Sdk\Resources\Fleet;

use Sharemat\Sdk\Api;

class Intervention extends Api
{
    /**
     * Get a collection of Intervention.
     *
     * @return array
     */
    public function getInterventions()
    {
        return self::getCollection('/interventions');
    }
    
    /**
     * Get a single Intervention by given id.
     *
     * @param int $id
     * @return array
     */
    public function getIntervention($id)
    {
        return self::getResource('/interventions/' . $id);
    }

    /**
     * Create a single Intervention.
     *
     * @param array $array
     * @return array
     */
    public function createIntervention($array)
    {
        return self::createResource('/interventions', $array);
    }

    /**
     * Update a single Intervention by given id.
     *
     * @param int $id
     * @param array $array
     * @return array
     */
    public function updateIntervention($id, $array)
    {
        return self::updateResource('/interventions/' . $id, $array);
    }

    /**
     * Delete a single Intervention by given id.
     *
     * @param int $id
     * @return array
     */
    public function deleteIntervention($id)
    {
        return self::deleteResource('/interventions/' . $id);
    }
}