<?php


namespace Tb07\DouDian\Buyin\Inst;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class BuyinInstProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['buyinInst'] = function ($container) {
            return new BuyinInst($container);
        };
    }
}
