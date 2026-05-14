<?php

namespace ModulesGarden\ProductsReseller\Server\rwhservers\Core\Facades;


use ModulesGarden\ProductsReseller\Server\rwhservers\Core\Cache\Services\DatabaseCache;

class Cache extends Facade
{
    protected static $cache = DatabaseCache::class;
}