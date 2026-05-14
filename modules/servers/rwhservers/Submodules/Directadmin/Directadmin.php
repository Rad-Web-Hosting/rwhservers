<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\Directadmin;

use ModulesGarden\ProductsReseller\Server\rwhservers\Calls\ServiceSSORequest;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Configuration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\HostingCustomField;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits\OutputBuffer;
use ModulesGarden\ProductsReseller\Server\rwhservers\Helpers\Dispatcher;
use ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\DefaultSubmodule;


class Directadmin extends DefaultSubmodule
{
    use OutputBuffer;

    public function details(array $params)
    {
        return [];
    }

    public function ssoLogin($params)
    {
        if (!$params['customfields'][HostingCustomField::SERVICE_ID])
        {
            return;
        }
        $postFields = [
            "id" => $params['customfields'][HostingCustomField::SERVICE_ID],
        ];

        $call = new  ServiceSSORequest(Configuration::create($params), $postFields);

        try
        {
            $result = $call->process();
        }
        catch (\Exception $e)
        {
            logModuleCall(
                'rwhservers',
                __FUNCTION__,
                $params,
                $e->getMessage(),
                $e->getTraceAsString()
            );
            return $e->getMessage();
        }

        $url = $result['data']['url'];

        if ($result['error'])
        {
            return [
                'templatefile' => Dispatcher::template('error'),
                'vars'         => $result['error']
            ];
        }

        $this->cleanOutputBuffer();
        header('Location: ' . $url);
        exit;
    }
}
