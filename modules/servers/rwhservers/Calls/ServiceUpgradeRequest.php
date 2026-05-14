<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceUpgradeRequest extends Call
{
    public $action = "services/:id/upgrade";

    public $type = parent::TYPE_POST;

}