<?php

namespace Tb07\DouDian\Buyin\Product;

use Tb07\DouDian\Core\BaseService;

class BuyinProduct extends BaseService
{
    /**
     * 批量查询推广商品详情
     * https://op.jinritemai.com/docs/api-docs/61/2867
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinProductsDetail(array $params)
    {
        return $this->app->http->post('buyin/productsDetail', $params, false);
    }
    /**
     * 达人视角商品详情
     * https://op.jinritemai.com/docs/api-docs/61/2866
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinKolProductsDetail(array $params)
    {
        return $this->app->http->post('buyin/kolProductsDetail', $params, false);
    }
    /**
     * 商品状态查询本接口用于查询某个/批商品是否投放到联盟，以及商品的推广状态和上下架状态
     * https://op.jinritemai.com/docs/api-docs/61/1497
     * @param array $params
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinMaterialsProductStatus(array $params)
    {
        return $this->app->http->post('buyin/materialsProductStatus', $params, false);
    }


}
