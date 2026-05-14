<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Submodules;

use ModulesGarden\ProductsReseller\Server\rwhservers\App\Http\Actions\ConfigOptions;
use ModulesGarden\ProductsReseller\Server\rwhservers\Calls\ProductsListRequest;
use ModulesGarden\ProductsReseller\Server\rwhservers\Calls\ServiceDetailsRequest;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Cache\Services\DatabaseCache;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Configuration;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Facades\Cache;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\HostingCustomField;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\ProductSettings\Repository;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\ModuleConstants;
use ModulesGarden\ProductsReseller\Server\rwhservers\Helpers\Dispatcher;
use WHMCS\Product\Product;

class DefaultSubmodule implements Submodule
{
    use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits\Lang;


    public function __construct()
    {
        $this->loadLang();
    }

    public function getInfo(array $params)
    {
        $vars['MGLANG']     = $this->lang;
        $vars['templateMG'] = Dispatcher::getTemplateForAction('clientarea');
        $vars['cssDir']     = ModuleConstants::getStylesDirForSmarty();

        return [
            'templatefile' => Dispatcher::template(),
            'vars'         => $vars
        ];
    }

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


    protected function areDetailsAvailable($params)
    {

        $product = Product::findOrFail($params['pid']);

        $response = Cache::get(ConfigOptions::PRODUCT_LIST_CACHE_KEY);
        if (!$response)
        {
            $call     = new  ProductsListRequest(Configuration::create($product->toArray()), []);
            $response = $call->process();
            Cache::remember(ConfigOptions::PRODUCT_LIST_CACHE_KEY, $response);
        }

        $actions            = [];
        $productSettings = (new Repository())->getProductSettings($params['pid']);
        $resellerProductPid = $productSettings['resellerProductId'];

        foreach ($response['data'] as $entity)
        {
            if ($entity['id'] == $resellerProductPid)
            {
                $actions = $entity['actions'];
            }
        }

        //Load and require available actions
        $params['availableActions'] = $actions;
        return $productSettings['action_details'] === 'on';
    }
}
