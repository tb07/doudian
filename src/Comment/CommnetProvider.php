<?php


namespace Tb07\DouDian\Comment;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class CommnetProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['commnet'] = function ($container) {
            return new Commnet($container);
        };
    }

}
