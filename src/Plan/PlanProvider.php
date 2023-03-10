<?php


namespace Tb07\DouDian\Plan;

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
