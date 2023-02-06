<?php


namespace Tb07\DouDian\Logistics;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class LogisticsProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['logistics'] = function ($container) {
            return new Logistics($container);
        };
    }
}
