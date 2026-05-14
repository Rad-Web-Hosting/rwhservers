<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServicePowerOffRequest extends Call
{
    public $action = "services/:id/powerOff";
    public $type = parent::TYPE_POST;
}
