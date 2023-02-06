<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Tb07\DouDian\Btas;

use Tb07\DouDian\Core\Container;
use Tb07\DouDian\Interfaces\Provider;

class BtasProvider implements Provider
{
    public function serviceProvider(Container $container)
    {
        $container['Btas'] = function ($container) {
            return new Btas($container);
        };
    }
}
