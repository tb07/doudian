<?php


namespace Tb07\DouDian\Product;

use Pimple\Container;
use Pimple\ServiceProviderInterface;


class ProductProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['product'] = function ($container) {
            return new Product($container);
        };
    }
}
