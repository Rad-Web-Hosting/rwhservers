<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\FileReader\Reader;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\ServiceLocator;

/**
 * Description of Json
 *
 * @author Rafał Ossowski <rafal.os@modulesgarden.com>
 */
class Html extends AbstractType
{

    protected function loadFile()
    {
        $return = '';
        try
        {
            if (file_exists($this->path . DIRECTORY_SEPARATOR . $this->file))
            {
                $return = file_get_contents($this->path . DIRECTORY_SEPARATOR . $this->file);
                foreach ($this->renderData as $key => $value)
                {
                    $return = str_replace("#$key#", $value, $return);
                }
            }
        }
        catch (\Exception $e)
        {
            ServiceLocator::call('errorManager')->addError(self::class, $e->getMessage(), $e->getTrace());
        }

        $this->data = $return;
    }
}
