<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\UI\Admin\Home\Pages;

use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Builder\BaseContainer;
use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AdminArea;

class HomePage extends BaseContainer implements AdminArea
{
    public function getText()
    {
        return 'Pobrany tekst';
    }
}