<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\DataTable\DataProviders\Providers;

/**
 *
 */
class JsonDataProvider extends \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Widget\DataTable\DataProviders\Providers\ArrayDataProvider
{

    public function setData($data = [], $params = [])
    {
        $this->data = json_decode($data);

        return $this;
    }
}
