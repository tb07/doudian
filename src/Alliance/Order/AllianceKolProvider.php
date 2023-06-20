<?php


namespace Tb07\DouDian\Alliance\Order;

use Pimple\ServiceProviderInterface;
use Pimple\Container;

class AllianceKolProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['allianceKol'] = function ($container) {
            return new AllianceKol($container);
        };
    }

}
