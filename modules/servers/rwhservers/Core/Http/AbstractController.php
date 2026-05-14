<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Http;

/**
 * Description of AbstractController
 *
 * @author Rafał Ossowski <rafal.os@modulesgarden.com>
 */
class AbstractController
{
    use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits\OutputBuffer;
    use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits\IsAdmin;
    use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Traits\RequestObjectHandler;

    public function __construct()
    {
        $this->loadRequestObj();
    }
}
