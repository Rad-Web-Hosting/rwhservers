<?php


namespace ModulesGarden\ProductsReseller\Server\rwhservers\Calls;


use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Call;

class StepTwo extends Call
{
    public $action = "services/:id/sslStepTwo";

    public $type = parent::TYPE_POST;
}