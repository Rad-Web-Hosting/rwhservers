<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceRebootRequest extends Call
{
    public $action = "services/:id/reboot";

    public $type = parent::TYPE_POST;

}