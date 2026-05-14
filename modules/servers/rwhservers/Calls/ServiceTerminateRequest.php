<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceTerminateRequest extends Call
{
    public $action = "services/:id/terminate";

    public $type = parent::TYPE_POST;

}