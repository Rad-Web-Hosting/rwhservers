<?php


namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\Http\Actions;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\HostingCustomField;

class AdminServicesTabFields implements AbstractAction
{
    protected $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * @return array
     */
    public function process(): array
    {
        $isSSL = \ModulesGarden\ProductsReseller\Server\rwhservers\Helpers\SSLSubmoduleChecker::check($this->params['serviceid']);

        $moduleObject = \ModulesGarden\ProductsReseller\Server\rwhservers\Submodules\SubmoduleController::getCurrentModuleObject($this->params);
        return $moduleObject->getAAInfo($this->params) ?? [];
    }
}