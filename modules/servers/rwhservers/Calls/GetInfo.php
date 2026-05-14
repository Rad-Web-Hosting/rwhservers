<?php


namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;


use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

class GetInfo extends Call
{
    public $action = "services/:id/getInfo";

    public $type = parent::TYPE_GET;
}