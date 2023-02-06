<?php


namespace Tb07\DouDian\Bill;

use Tb07\DouDian\Core\BaseService;

class Bill extends BaseService
{
    //仅自用型应用可使调用该接口 查询订单账单明细
    public function settle($params)
    {
        return $this->app->http->post('order/settle', $params);
    }

    //查询联盟订单明细
    public function getOrderList($params)
    {
        return $this->app->http->post('alliance/getOrderList', $params);
    }

    //查询账单明细
    public function getSettleBillDetail($params)
    {
        return $this->app->http->post('order/getSettleBillDetail', $params);
    }
}
