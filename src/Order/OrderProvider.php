<?php


namespace Tb07\DouDian\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class OrderProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['order'] = function ($container) {
            return new Order($container);
        };
    }
}
