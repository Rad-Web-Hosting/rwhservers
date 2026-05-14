<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceXTermConsoleRequest extends Call
{
    public $action = "services/:id/xTermConsole";
    public $type = parent::TYPE_POST;
}