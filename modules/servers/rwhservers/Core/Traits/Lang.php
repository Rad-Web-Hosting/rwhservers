<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\ServiceLocator;

trait Lang
{
    /**
     * @var null|\ModulesGarden\ProductsReseller\Server\rwhservers\Core\Lang\Lang
     */
    protected $lang = null;

    public function loadLang()
    {
        if ($this->lang === null)
        {
            $this->lang = ServiceLocator::call('lang');
        }
    }
}