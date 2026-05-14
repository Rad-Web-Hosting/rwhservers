<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\Http\Actions;

use ModulesGarden\ProductsReseller\Server\rwhservers\Calls;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Configuration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\HostingCustomField;

class Renew implements AbstractAction
{
    protected $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function process(): string
    {
        $postfields =
            [
                "id" => $this->params['customfields'][HostingCustomField::SERVICE_ID],
            ];
        $call       = new  Calls\ServiceRenewRequest(Configuration::create($this->params), $postfields);
        $result     = $call->process();
        return $result['error'] ?: 'success';
    }
}