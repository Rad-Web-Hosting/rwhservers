<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceStartRequest extends Call
{
    public $action = "services/:id/start";
    public $type = parent::TYPE_POST;

}