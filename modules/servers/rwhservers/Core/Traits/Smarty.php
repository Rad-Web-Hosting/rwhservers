<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\ServiceLocator;

trait Smarty
{
    /**
     * @var null|\ModulesGarden\ProductsReseller\Server\rwhservers\Core\Http\View\Smarty
     */
    protected $smarty = null;

    public function loadSmarty()
    {
        if ($this->smarty === null)
        {
            $this->smarty = ServiceLocator::call('smarty');
            if (property_exists($this, 'lang') && method_exists($this, 'loadLang'))
            {
                $this->loadLang();
                $this->smarty->setLang($this->lang);
            }
            else
            {
                $lang = ServiceLocator::call('lang');
                $this->smarty->setLang($lang);
            }
        }
    }

    public function getSmarty()
    {
        if ($this->smarty === null)
        {
            $this->loadSmarty();
        }

        return $this->smarty;
    }
}
