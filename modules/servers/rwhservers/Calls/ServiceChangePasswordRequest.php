<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ServiceChangePasswordRequest extends Call
{
    public $action = "services/:id/changepassword";

    public $type = parent::TYPE_POST;

}