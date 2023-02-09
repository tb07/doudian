<?php


namespace Tb07\DouDian\Buyin\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class BuyinOrderProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['buyinOrder'] = function ($container) {
            return new BuyinOrder($container);
        };
    }
}
