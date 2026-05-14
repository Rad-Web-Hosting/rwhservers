<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\ResponseTemplates;

use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\ResponseInterface;

/**
 *  Ajax Json Data Response
 */
class DataJsonResponse extends Response implements ResponseInterface
{
    protected $dataType = 'data';
}
