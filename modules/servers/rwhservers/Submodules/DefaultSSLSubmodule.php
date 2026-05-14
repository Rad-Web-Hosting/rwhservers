<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Submodules;

use ModulesGarden\ProductsReseller\Server\rwhservers\App\Http\Actions\Synchronize;
use ModulesGarden\ProductsReseller\Server\rwhservers\Calls\ServiceDetailsRequest;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Cache\Services\DatabaseCache;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Configuration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Facades\Cache;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\HostingCustomField;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\Whmcs\SslOrders;
use ModulesGarden\ProductsReseller\Server\rwhservers\Helpers\DataSingleton;
use ModulesGarden\ProductsReseller\Server\rwhservers\Helpers\Dispatcher;
use WHMCS\Product\Product;

class DefaultSSLSubmodule implements SSLSubmodule
{
    use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits\Lang;

    public function __construct()
    {
        $this->loadLang();
    }


    /**
     * @param array $params
     * @return array|mixed
     * @throws \Exception
     */
    public function sslStepOne(array $params)
    {
        $this->validateCustomField($params['customfields'], HostingCustomField::SERVICE_ID);
        $postfields       = $params;
        $postfields['id'] = $params['customfields'][HostingCustomField::SERVICE_ID];

        $call = new  \ModulesGarden\ProductsReseller\Server\rwhservers\Calls\StepOne(Configuration::create($params), $postfields);
        try
        {
            $result = $call->process();
        }
        catch (\Exception $e)
        {
            return ['error' => $e->getMessage()];
        }
        return $result['result'];
    }

    /**
     * @param array $params
     * @return array|bool|mixed|\stdClass|string
     * @throws \Exception
     */
    public function sslStepTwo(array $params)
    {
        $this->validateCustomField($params['customfields'], HostingCustomField::SERVICE_ID);
        $postfields       = $params;
        $postfields['id'] = $params['customfields'][HostingCustomField::SERVICE_ID];

        $call = new  \ModulesGarden\ProductsReseller\Server\rwhservers\Calls\StepTwo(Configuration::create($params), $postfields);

        try
        {
            $result = $call->process();
        }
        catch (\Exception $e)
        {
            return ['error' => $e->getMessage()];
        }
        return $result;
    }

    /**
     * @param array $params
     * @return array|bool|mixed|\stdClass|string
     * @throws \Exception
     */
    public function sslStepThree(array $params)
    {
        $this->validateCustomField($params['customfields'], HostingCustomField::SERVICE_ID);
        $postfields       = $params;
        $postfields['id'] = $params['customfields'][HostingCustomField::SERVICE_ID];

        $call = new  \ModulesGarden\ProductsReseller\Server\rwhservers\Calls\StepThree(Configuration::create($params), $postfields);
        try
        {
            $result = $call->process();
            (new Synchronize)->execute($params);
        }
        catch (\Exception $e)
        {
            return ['error' => $e->getMessage()];
        }
        return $result;
    }

    /**
     * @param array $customfields
     * @param string $field
     * @throws \Exception
     */
    protected function validateCustomField(array $customfields, string $field): void
    {
        if (!isset($customfields[$field]))
        {
            DataSingleton::getInstance()->setErrorMessage('A The custom field ' . $field . ' is empty.');
            throw new \Exception('The custom field ' . $field . ' is empty.');
        }
    }

    /**
     * @param array $params
     * @return array
     */
    public function getInfo(array $params)
    {
        $sslOrder       = SslOrders::where('serviceid', $params['serviceid'])->first();
        $vars['MGLANG'] = $this->lang;
        if ($sslOrder->status == 'Awaiting Configuration')
        {
            $vars['configURL'] = 'configuressl.php?cert=' . md5($sslOrder->id);
        }

        $vars['templateMG'] = Dispatcher::getTemplateForAction('clientarea');
        return [
            'templatefile' => Dispatcher::template(),
            'vars'         => $vars
        ];

    }

    /**
     * @param array $params
     */
    public function getAAInfo(array $params)
    {
        return [];
    }

    public function details(array $params)
    {
        $postfields =
            [
                "id" => $params['customfields'][HostingCustomField::SERVICE_ID],
            ];
        Cache::init();
        $cacheKey = DatabaseCache::SERVICE_DETAILS_CACHE_KEY . $postfields['id'];

        $serviceDetails = Cache::get($cacheKey);

        if (!$serviceDetails)
        {
            $call           = new  ServiceDetailsRequest(Configuration::create($params), $postfields);
            $serviceDetails = $call->process();
            Cache::remember($cacheKey, $serviceDetails, 1);
        }
        return $serviceDetails;
    }
}
