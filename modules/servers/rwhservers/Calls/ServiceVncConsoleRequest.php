<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceVncConsoleRequest extends Call
{
    public $action = "services/:id/noVncConsole";
    public $type = parent::TYPE_POST;
}