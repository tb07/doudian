<?php


namespace Tb07\DouDian\Buyin\Product;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class BuyinProductProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['buyinProduct'] = function ($container) {
            return new BuyinProduct($container);
        };
    }
}
