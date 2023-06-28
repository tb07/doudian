<?php


namespace Tb07\DouDian\Alliance;

use Pimple\ServiceProviderInterface;
use Pimple\Container;

class AllianceOauthProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['allianceOauth'] = function ($container) {
            return new AllianceOauth($container);
        };
    }

}
