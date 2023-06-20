<?php

namespace Tb07\DouDian;

use Tb07\DouDian\AfterSale\AfterSale;
use Tb07\DouDian\AfterSale\AfterSaleProvider;
use Tb07\DouDian\Alliance\Order\AllianceKol;
use Tb07\DouDian\Alliance\Order\AllianceKolProvider;
use Tb07\DouDian\Alliance\User\AllianceAuth;
use Tb07\DouDian\Alliance\User\AllianceAuthProvider;
use Tb07\DouDian\Auth\Auth;
use Tb07\DouDian\Auth\AuthProvider;
use Tb07\DouDian\Buyin\Goods\BuyinGoods;
use Tb07\DouDian\Buyin\Goods\BuyinGoodsProvider;
use Tb07\DouDian\Buyin\Inst\BuyinInst;
use Tb07\DouDian\Buyin\Inst\BuyinInstProvider;
use Tb07\DouDian\Buyin\Order\BuyinOrder;
use Tb07\DouDian\Buyin\Order\BuyinOrderProvider;
use Tb07\DouDian\Buyin\Product\BuyinProduct;
use Tb07\DouDian\Buyin\Product\BuyinProductProvider;
use Tb07\DouDian\Core\Container;
use Tb07\DouDian\Http\Http;
use Tb07\DouDian\Http\HttpProvider;
use Tb07\DouDian\Order\Order;
use Tb07\DouDian\Order\OrderProvider;
use Tb07\DouDian\Plan\Plan;
use Tb07\DouDian\Plan\PlanProvider;
use Tb07\DouDian\Product\Product;
use Tb07\DouDian\Product\ProductProvider;


/**
 * Class DouDian
 * @package Tb07\DouDian
 * @property-read Http $http
 * @property-read Auth $auth
 * @property-read Product $product
 * @property-read BuyinProduct $buyinProduct
 * @property-read BuyinGoods $buyinGoods
 * @property-read Plan $plan
 * @property-read AfterSale $afterSale
 * @property-read BuyinOrder $buyinOrder
 * @property-read Order $order
 * @property-read BuyinInst $buyinInst
 * @property-read AllianceAuth $allianceAuth
 * @property-read AllianceKol $allianceOrder
 */
class DouDian extends Container
{
    protected $baseUri   = 'https://openapi-fxg.jinritemai.com/';//正式环境
    protected $providers = [
        HttpProvider::class,
        ProductProvider::class,
        BuyinProductProvider::class,
        AuthProvider::class,
        PlanProvider::class,
        AfterSaleProvider::class,
        BuyinOrderProvider::class,
        OrderProvider::class,
        BuyinGoodsProvider::class,
        BuyinInstProvider::class,
        AllianceAuthProvider::class,
        AllianceKolProvider::class,
    ];

    public function getAppKey()
    {
        return $this->getConfig('app_key');
    }

    public function getAppSecret()
    {
        return $this->getConfig('app_secret');
    }

    public function getServiceId()
    {
        return $this->getConfig('service_id');
    }

    public function setAccessToken($accessToken)
    {
        $config = $this->getConfig();
        $config = array_merge($config, ['access_token' => $accessToken]);
        $this->setConfig($config);
    }

    public function getAccessToken()
    {
        return $this->getConfig('access_token');
    }

    public function getBaseUri()
    {
        return $this->baseUri;
    }

    public function setBaseUri($baseUri)
    {
        return $this->baseUri = $baseUri;
    }
}