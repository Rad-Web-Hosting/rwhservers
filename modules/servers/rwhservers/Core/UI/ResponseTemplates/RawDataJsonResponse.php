<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\ResponseTemplates;

use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\ResponseInterface;

/**
 * Ajax Raw Data Json Response
 */
class RawDataJsonResponse extends Response implements ResponseInterface
{
    protected $dataType = 'rawData';
}
