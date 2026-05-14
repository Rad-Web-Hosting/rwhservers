<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Http\Admin;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Http\AbstractController;

class PageNotFound extends AbstractController
{
    public function index()
    {
        $pageControler = new \ModulesGarden\ProductsReseller\Server\rwhservers\Core\App\Controllers\Http\PageNotFound();

        return $pageControler->execute();
    }
}
