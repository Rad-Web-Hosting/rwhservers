<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Traits;

use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\HandlerError\ErrorCodes\ErrorCodesLib;
use \ModulesGarden\ProductsReseller\Server\rwhservers\Core\HandlerError\ErrorCodes\ErrorCodes;

trait ErrorCodesLibrary
{
    /**
     * @var ErrorCodesLib
     */
    protected $errorCodesCoreHandler = null;

    /**
     * @var ErrorCodesLib
     */
    protected $errorCodesAppHandler = null;

    public function loadErrorCodes()
    {
        if ($this->errorCodesCoreHandler === null)
        {
            $this->errorCodesCoreHandler = new ErrorCodesLib();
        }

        if ($this->errorCodesAppHandler === null)
        {
            $this->errorCodesAppHandler = new \ModulesGarden\ProductsReseller\Server\rwhservers\App\Helpers\ErrorCodesLib();
        }
    }

    public function genErrorCode($code = null)
    {
        $this->loadErrorCodes();

        if ($this->errorCodesAppHandler->errorCodeExists($code[ErrorCodes::CODE]))
        {
            return $this->errorCodesAppHandler->getErrorMessageByCode($code[ErrorCodes::CODE]);
        }

        return $this->errorCodesCoreHandler->getErrorMessageByCode($code[ErrorCodes::CODE]);
    }
}
