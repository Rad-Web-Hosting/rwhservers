<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Hook\Interfaces;

interface InternalHook
{
    public function __construct($params);

    public function execute();
}
