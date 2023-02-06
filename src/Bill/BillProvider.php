<?php

namespace Tb07\DouDian\Bill;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class BillProvider implements ServiceProviderInterface
{

    public function register(Container $container)
    {
        $container['bill'] = function ($container) {
            return new Bill($container);
        };
    }


}
