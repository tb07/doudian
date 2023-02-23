<?php


namespace Tb07\DouDian\Buyin\Goods;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class BuyinGoodsProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['buyinGoods'] = function ($container) {
            return new BuyinGoods($container);
        };
    }
}
