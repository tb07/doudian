<?php


namespace Tb07\DouDian\Alliance\User;

use Pimple\ServiceProviderInterface;
use Pimple\Container;

class AllianceAuthProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['allianceAuth'] = function ($container) {
            return new AllianceAuth($container);
        };
    }

}
