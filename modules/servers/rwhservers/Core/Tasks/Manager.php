<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Tasks;

use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Models\Tasks\Tasks;

class Manager
{
    public function __construct()
    {

    }

    /**
     *
     */
    public function run()
    {
        foreach ($this->getTasks() as $task)
        {

        }
    }

    /**
     * @TODO - all pagination
     * @return mixed
     */
    protected function getTasks()
    {
        return Tasks::get();
    }
}