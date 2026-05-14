<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Traits;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AdminArea;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\ClientArea;

/**
 * Icons related functions
 *
 * @author Rafał Ossowski <rafal.os@modulesgarden.com>
 */
trait ACL
{
    protected $isAdminAcl;

    public function setIsAdminAcl($isAdmin)
    {
        $this->isAdminAcl = $isAdmin;

        return $this;
    }

    protected function isCoreElementAcl($element)
    {
        return (strpos(get_class($element), 'ModulesGarden\ProductsReseller\Server\rwhservers\Core') !== false);
    }

    protected function checkIsAdminArea($element)
    {
        return ($element instanceof AdminArea);
    }

    protected function checkIsClientArea($element)
    {
        return ($element instanceof ClientArea);
    }

    public function validateElement($element)
    {
        if ($this->isCoreElementAcl($element) || $this->isAdminAcl && $this->checkIsAdminArea($element) || !$this->isAdminAcl && $this->checkIsClientArea($element))
        {
            return true;
        }

        return false;
    }
}
