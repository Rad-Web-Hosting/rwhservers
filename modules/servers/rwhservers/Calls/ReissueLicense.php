<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

/**
 * Description of CheckAvailability
 *
 * @author inbs
 */
class ReissueLicense extends Call
{
    public $action = "services/:id/reissue";

    public $type = parent::TYPE_POST;

}