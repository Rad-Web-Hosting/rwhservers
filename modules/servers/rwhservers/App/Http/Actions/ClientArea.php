<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\Http\Actions;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\ProductSettings\Repository;
use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits\Lang;
use WHMCS\Product\Product;

class ClientArea implements AbstractAction
{
    use Lang;

    protected $params;
    protected $lang;

    public function __construct($params)
    {
        $this->params = $params;
        $this->loadLang();
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function process()
    {
        if ($_REQUEST['modop'] === 'custom')
        {
            return $this->productDetails($this->params, true);
        }
        $isSSL = \ModulesGarden\ProductsReseller\Server\rwhservers\Helpers\SSLSubmoduleChecker::check($this->params['serviceid']);
        $isSSL = $isSSL ?: \ModulesGarden\ProductsReseller\Server\rwhservers\Helpers\SSLSubmoduleChecker::checkByName($this->params['serviceid']);
        if ($isSSL)
        {
            if (!function_exists('rwhservers_getInfo'))
            {
                throw new \Exception($this->lang->T('loadingConfigurationProblemPleaseContactAdministrator'));
            }
            $caTemplate = rwhservers_getInfo($this->params);
            return $caTemplate;
        }
        else
        {
            if ($_REQUEST['a'])
            {
                if (!function_exists('rwhservers_' . $_REQUEST['a']))
                {
                    return [];
                }
                $caTemplate = call_user_func_array('rwhservers_' . $_REQUEST['a'], [$this->params]);
            }
            else
            {
                $caTemplate = $this->productDetails($this->params, false);
            }
            return $caTemplate;
        }
    }

    protected function productDetails($params, $isModop)
    {
        $productRepo = new Repository();
        if ($productRepo->getProductSettings($params['pid'])['action_details'] === 'on' && function_exists('rwhservers_details'))
        {
            $caTemplate = rwhservers_details($this->params);

            if ($caTemplate === 'success')
            {
                return $caTemplate;
            }

            if ($caTemplate['error'])
            {
                throw new \Exception($caTemplate['error']);
            }

            return $caTemplate;
        }
        if (function_exists('rwhservers_getInfo'))
        {
            $caTemplate = rwhservers_getInfo($this->params);

            if ($caTemplate === 'success')
            {
                return $caTemplate;
            }

            if (is_string($caTemplate))
            {
                throw new \Exception($caTemplate);
            }

            if ($caTemplate['error'])
            {
                throw new \Exception($caTemplate['error']);
            }

            return $caTemplate;
        }
        if (!$isModop)
        {
            return [];
        }

    }
}
