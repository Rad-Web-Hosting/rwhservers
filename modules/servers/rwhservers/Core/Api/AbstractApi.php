<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Api;

use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\Api\AbstractApi\Curl\Request;
use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\DependencyInjection;

/**
 * Description of AbstractApi
 *
 * @author Rafał Ossowski <rafal.os@modulesgarden.com>
 */
class AbstractApi
{
    protected $token;
    protected $code;

    /**
     * @return Request
     */
    protected function getNewRequest()
    {
        return DependencyInjection::create(Request::class);
    }
}
