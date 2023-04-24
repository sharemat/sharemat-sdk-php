<?php

namespace Sharemat\Sdk\Resources\Fleet;

use Sharemat\Sdk\Api;

class MaintenanceConfiguration extends Api
{
    /**
     * Update or Create MaintenanceConfiguration.
     *
     * @param array $array
     * @return array
     */
    public function upsertMaintenanceConfiguration($array)
    {
        return self::createResource('/maintenance/maintenance_configuration/upsert', $array);
    }
}