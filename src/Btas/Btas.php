<?php


namespace Tb07\DouDian\Btas;

use Tb07\DouDian\Core\BaseService;

class Btas extends BaseService
{
    //查询订单是否需要质检
    public function getInspectionOrder(string $order_id)
    {
        $params['order_id'] = $order_id;

        return $this->app->http->post('btas/getInspectionOrder', $params);
    }

    //商家调用发货
    public function shipping($params)
    {
        return $this->app->http->post('btas/shipping', $params);
    }

    //图片质检送检
    public function saveInspectionOnline($params)
    {
        return $this->app->http->post('btas/saveInspectionOnline', $params);
    }

    //获取订单的质检结果
    public function getOrderInspectionResult($params)
    {
        return $this->app->http->post('btas/getOrderInspectionResult', $params);
    }

    //商家送检调用
    public function saveInspectionInfo($params)
    {
        return $this->app->http->post('btas/saveInspectionInfo', $params);
    }

    //获取可图片鉴定的品牌
    public function listBrand($params)
    {
        return $this->app->http->post('btas/listBrand', $params);
    }

    //下载bic订单码
    public function downloadOrderCodeByShop($order_id)
    {
        $params['order_id'] = $order_id;

        return $this->app->http->post('orderCode/downloadOrderCodeByShop', $params);
    }

    //bic流程订单商家发货接口
    public function erpShopBindOrderCode($params)
    {
        return $this->app->http->post('orderCode/erpShopBindOrderCode', $params);
    }
}
