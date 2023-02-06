<?php


namespace Tb07\DouDian\Auth;

use Pimple\ServiceProviderInterface;
use Pimple\Container;

class AuthProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['auth'] = function ($container) {
            return new Auth($container);
        };
    }

}
