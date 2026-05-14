<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceSSORequest extends Call
{
    public $action = "services/:id/ssologin";

    public $type = parent::TYPE_POST;

}
