<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceBootRequest extends Call
{
    public $action = "services/:id/boot";
    public $type = parent::TYPE_POST;
}
