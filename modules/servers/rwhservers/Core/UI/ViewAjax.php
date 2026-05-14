<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI;

use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\Helper;

/**
 * Main Vuew Controler
 * @author Sławomir Miśkowicz <slawomir@modulesgarden.com>
 */
class ViewAjax extends View
{
    protected $elements = [];
    protected $namespace = '';

    public function __construct($template = null)
    {
        $this->setTemplate($template);
        $this->mainContainer = new \ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\MainContainerAjax();
    }

    /**
     * Adds elements to the root element
     */
    public function addElement($element, $containerName = null)
    {
        return $this;
    }

    public function validateAcl($isAdmin)
    {
        $this->mainContainer->valicateACL($isAdmin);

        return $this;
    }

    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        $this->mainContainer->setNamespaceAjax($this->namespace);

        return $this;
    }

    /**
     * Generates all responses for UI elements
     */
    public function getResponse()
    {
        if (!Helper\isInRootNamespace(Helper\convertStringToNamespace($this->namespace)))
        {
            return null;
        }

        return $this->mainContainer->getAjaxResponse();
    }

    public function initAjaxElementContext($namespace)
    {
        $namespaceConverted = Helper\convertStringToNamespace($namespace);

        if (!in_array(\ModulesGarden\ProductsReseller\Server\rwhservers\Core\UI\Interfaces\AjaxElementInterface::class, class_implements($namespaceConverted) ?? []))
        {
            return $this;
        }

        if (!Helper\isInRootNamespace($namespaceConverted))
        {
            return null;
        }

        $this->setNamespace($namespace);
        $this->mainContainer->addElement(Helper\convertStringToNamespace($namespace));
    }
}
