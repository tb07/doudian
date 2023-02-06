<?php


namespace Tb07\DouDian\Insurance;


use Pimple\Container;
use Pimple\ServiceProviderInterface;

class InsuranceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['insurance'] = function ($container) {
            return new Insurance($container);
        };
    }

}
