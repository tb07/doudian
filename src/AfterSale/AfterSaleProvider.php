<?php


namespace Tb07\DouDian\AfterSale;

use Pimple\ServiceProviderInterface;
use Pimple\Container;

class AfterSaleProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['afterSale'] = function ($container) {
            return new AfterSale($container);
        };
    }

}
