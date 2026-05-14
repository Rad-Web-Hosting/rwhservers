<?php


namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\Http\Actions;

use ModulesGarden\ProductsReseller\Server\rwhservers\Calls;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Configuration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\HostingCustomField;

class ChangePassword implements AbstractAction
{
    protected $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function process(): string
    {
        $postfields =
            [
                "id"       => $this->params['customfields'][HostingCustomField::SERVICE_ID],
                "password" => $this->params['password']
            ];
        $call       = new  Calls\ServiceChangePasswordRequest(Configuration::create($this->params), $postfields);
        $result     = $call->process();
        return $result['error'] ?: 'success';
    }
}