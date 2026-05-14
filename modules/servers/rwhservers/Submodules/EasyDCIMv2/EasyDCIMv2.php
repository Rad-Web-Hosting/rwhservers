<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\EasyDCIMv2;

use ModulesGarden\ProductsReseller\Server\rwhservers\Calls\ServiceGraphsRequest;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Cache\Services\DatabaseCache;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Configuration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Facades\Cache;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Helper\BuildUrl;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\HostingCustomField;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\ProductSettings\Repository;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\ModuleConstants;
use ModulesGarden\ProductsReseller\Server\rwhservers\Helpers\Dispatcher;
use ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\DefaultSubmodule;
use ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\EasyDCIMv2\app\UI\Client\Pages\ServerInformation;
use ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\EasyDCIMv2\app\UI\Client\Pages\GeneralInformation;
use ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\EasyDCIMv2\app\UI\Client\Pages\LocationInformation;

class EasyDCIMv2 extends DefaultSubmodule
{
    public function details(array $params)
    {
        try
        {
            if (!$params['customfields'][HostingCustomField::SERVICE_ID])
            {
                return ['error' => 'The custom field Service ID is empty.'];
            }

            if ($this->areDetailsAvailable($params))
            {
                $vars['details'] = parent::details($params);
            }
            $productConfig = (new Repository())->getProductSettings($params['packageid']);
            $serverInformation = new ServerInformation($vars['details']['deviceInformation'], $vars['details']['installInformation'],$vars['details']['productSettings']);
            $generalInformation = new GeneralInformation($vars['details']['deviceInformation']);
            $locationInformation = new LocationInformation($vars['details']['deviceInformation']);
            $vars['serverInformation'] = $serverInformation;
            $vars['generalInformation'] = $generalInformation;
            $vars['locationInformation'] = $locationInformation;
            $vars['configuration'] = $vars['details']['productSettings'];
            $vars['cssDir']  = ModuleConstants::getStylesDirForSmarty();
            $vars['assetsURL']  = BuildUrl::getAssetsURL();
            $vars['productConfig']  = $productConfig;
            $vars['MGLANG']     = $this->lang;
            $vars['templateMG'] = Dispatcher::getTemplateForAction();

            return [
                'templatefile' => Dispatcher::template(),
                'vars'         => $vars
            ];
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
            return ['error' => $e->getMessage()];
        }
    }

    public function __call(string $name, array $arguments)
    {
        $params       = $arguments[0];
        $requestClass = '';
        switch ($name)
        {
            case 'boot':
                $requestClass = 'ServiceBootRequest';
                break;
            case 'shutdown':
                $requestClass = 'ServiceShutdownRequest';
                break;
            case 'reboot':
                $requestClass = 'ServiceRebootRequest';
                break;
        }

        if ($requestClass === '')
        {
            return $name . ' does not exist.';
        }
        try
        {
            if (!$params['customfields'][HostingCustomField::SERVICE_ID])
            {
                return 'The custom field Service ID is empty.';
            }
            $postfields =
                [
                    "id" => $params['customfields'][HostingCustomField::SERVICE_ID],
                ];
            $class      = "ModulesGarden\\ProductsReseller\\Server\\rwhservers\\Calls\\" . $requestClass;
            $call       = new  $class(Configuration::create($params), $postfields);
            $result     = $call->process();
        }
        catch (\Exception $e)
        {
            logModuleCall(
                'EasyDCIMIntegrationsecond',
                __FUNCTION__,
                $params,
                $e->getMessage(),
                $e->getTraceAsString()
            );
            return $e->getMessage();
        }
    }

    public function graphs(array $params)
    {

        if (!$params['customfields'][HostingCustomField::SERVICE_ID])
        {
            return 'The custom field Service ID is empty.';
        }
        try
        {
            if ($_REQUEST['graphType'])
            {
                $graphInfo = [
                    'interval'=>  $_REQUEST['interval'],
                    'type'=>  $_REQUEST['graphType']
                ];
                $postfields    =
                    [
                        "id"        => $params['customfields'][HostingCustomField::SERVICE_ID],
                        "timeframe" => "json:" . json_encode($graphInfo),
                    ];
                $call          = new  ServiceGraphsRequest(Configuration::create($params), $postfields);
                $result        = $call->process();
                self::jsonEncode((array)$result['data']);
            }
            else
            {
                $this->checkIfGraphDetailsAreAvailable($params);
                ModuleConstants::initialize();
                $vars['cssDir']           = ModuleConstants::getStylesDirForSmarty();
                $vars['jsDir']            = ModuleConstants::getJsDirForSmarty();
                $vars['MGLANG']           = $this->lang;
                $vars['assetsURL']  = BuildUrl::getAssetsURL();

                $vars['templateMG'] = Dispatcher::getTemplateForAction();
                return [
                    'templatefile' => Dispatcher::template(),
                    'vars'         => $vars
                ];
            }
        }
        catch (\Exception $e)
        {
            logModuleCall(
                'EasyDCIMIntegrationsecond',
                __FUNCTION__,
                $params,
                $e->getMessage(),
                $e->getTraceAsString()
            );
            return $e->getMessage();
        }
    }

    /**
     * @param array $data
     */
    public static function jsonEncode(array $data)
    {
        ob_clean();
        echo(json_encode([
            'data'=>$data
        ]));
        die;
    }

    public function checkIfGraphDetailsAreAvailable(array $params)
    {
        $timeframe = date('Ym');
        $postfields =
            [
                "id" => $params['customfields'][HostingCustomField::SERVICE_ID],
                "timeframe" => $timeframe,
            ];
        Cache::init();
        $cacheKey = DatabaseCache::SERVICE_DETAILS_CACHE_KEY . $postfields['id'];

        $graphDetails = Cache::get($cacheKey);

        if (!$graphDetails)
        {
            $call           = new  ServiceGraphsRequest(Configuration::create($params), $postfields);
            $graphDetails = $call->process();
            Cache::remember($cacheKey, $graphDetails, 1);
        }
        return $graphDetails;
    }
}