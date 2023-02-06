<?php

namespace Tb07\DouDian\Shop;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ShopProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['shop'] = function ($container) {
            return new Shop($container);
        };
    }

}
