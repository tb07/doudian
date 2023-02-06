<?php


namespace Tb07\DouDian\Http;

use Pimple\ServiceProviderInterface;
use Pimple\Container;

class HttpProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['http'] = function ($container) {
            return new Http($container);
        };
    }

}
