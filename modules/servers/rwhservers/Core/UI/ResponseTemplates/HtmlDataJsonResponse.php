<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\ResponseTemplates;

use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\ResponseInterface;

/**
 *  Ajax Html Data Response
 */
class HtmlDataJsonResponse extends Response implements ResponseInterface
{
    protected $dataType = 'htmlData';
}
