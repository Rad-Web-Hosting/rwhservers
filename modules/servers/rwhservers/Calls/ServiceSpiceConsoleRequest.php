<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceSpiceConsoleRequest extends Call
{
    public $action = "services/:id/spiceConsole";
    public $type = parent::TYPE_POST;
}