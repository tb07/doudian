<?php


namespace Tb07\DouDian\Buyin\Order;

use Tb07\DouDian\Core\BaseService;

/**
 * 精选联盟订单
 * Class BuyinOrder
 * @package Tb07\DouDian\Buyin\Order
 */
class BuyinOrder extends BaseService
{
    /**
     * 商家分次结算订单
     * https://op.jinritemai.com/docs/api-docs/61/2703
     * @param array $params
     * [
     *  size        Int64   否  50 查询数目，最大100
     *  cursor      String  否  0 下一页索引，第一页传‘0’
     *  time_type   String  否  settle 查询时间类型：settle（结算时间），update（更新时间，认值）
     *  start_time  String  否  2022-10-01 00:00:00开始时间
     *  end_time    String  否  2022-10-01 00:00:00结束时间，与开始时间相差不能超过90天
     *  order_ids   String  否  订单号列表 对个使用逗号隔开
     * ]
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinShopMultiSettlementOrders(array $params)
    {
        return $this->app->http->post('buyin/shopMultiSettlementOrders', $params);
    }

    /**
     * 联盟商家-获取联盟订单
     * https://op.jinritemai.com/docs/api-docs/61/2407
     * @param array $params
     * [
     *  size        Int64   否  50 查询数目，最大100
     *  cursor      String  否  0 下一页索引，第一页传‘0’
     *  time_type   String  否  查询时间类型。pay: 支付时间（默认）; update：联盟侧更新时间，非订单状态更新时间
     *  start_time  String  否  2022-10-01 00:00:00开始时间
     *  end_time    String  否  2022-10-01 00:00:00结束时间，与开始时间相差不能超过90天
     *  order_ids   String  否  订单号列表 对个使用逗号隔开
     * ]
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinQueryShopAllianceOrder(array $params)
    {
        return $this->app->http->post('buyin/queryShopAllianceOrder', $params);
    }

    /**
     * 联盟商家-获取联盟订单
     * https://op.jinritemai.com/docs/api-docs/61/2829
     * @param array $params
     * [
     *  text        String   是  联系方式密文
     * ]
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function decryptContactInfo(array $params)
    {
        return $this->app->http->post('/buyin/decryptContactInfo', $params);
    }
}
