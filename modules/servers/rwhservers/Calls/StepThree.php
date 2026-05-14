<?php


namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;


use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

class StepThree extends Call
{
    public $action = "services/:id/sslStepThree";

    public $type = parent::TYPE_POST;
}