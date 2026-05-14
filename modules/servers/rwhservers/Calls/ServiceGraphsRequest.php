<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceGraphsRequest extends Call
{
    public $action = "services/:id/graphs";

    public $type = parent::TYPE_GET;


}