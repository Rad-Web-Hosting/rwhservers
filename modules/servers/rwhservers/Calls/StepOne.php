<?php


namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;


use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

class StepOne extends Call
{
    public $action = "services/:id/sslStepOne";

    public $type = parent::TYPE_POST;
}