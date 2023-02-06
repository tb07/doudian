<?php


namespace Tb07\DouDian\Stock;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class StockProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['stock'] = function ($container) {
            return new Stock($container);
        };
    }

}
