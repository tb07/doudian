<?php


namespace Tb07\DouDian\Order;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PlanProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['plan'] = function ($container) {
            return new Plan($container);
        };
    }
}
