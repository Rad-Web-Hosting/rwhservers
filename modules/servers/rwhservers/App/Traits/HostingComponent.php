<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\App\Traits;



use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\Whmcs\Hosting;

/**
 * HostingComponent trait
 *
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
trait HostingComponent
{
    /**
     * @var Hosting $hosting
     */
    protected $hosting = null;

    public function initHosting($id)
    {
        $this->hosting = Hosting::where('id', $id)->first();
    }

}
