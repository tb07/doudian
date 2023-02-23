<?php


namespace Tb07\DouDian\Buyin\Goods;

use Tb07\DouDian\Core\BaseService;

/**
 * 精选联商品
 * Class BuyinOrder
 * @package Tb07\DouDian\Buyin\Order
 */
class BuyinGoods extends BaseService
{

    /**
     * 商家可参与的团长活动查询接口
     * https://op.jinritemai.com/docs/api-docs/61/1671
     * @param array $params
     * [
     *  apply_status        Int32   是  1、我报名的活动 2、可以报名的活动
     *  page                Int64   否  页码
     *  page_size           Int64   否  每页条数
     *  commission_rate_min Int32   否  最低佣金率（5.5%,传550）
     *  commission_rate_max Int32   否  最高佣金率
     *  service_rate_min    Int32   否  最低服务费率
     *  service_rate_max    Int32   否  最低服务费率
     *  product_category_id Int32   否  类目id
     *  inst_acti_name      String  否  团长名称或活动名称-模糊搜索
     * ]
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinShopActivityList(array $params)
    {
        return $this->app->http->post('buyin/ShopActivityList', $params, false);
    }

    /**
     * 商家侧获取团长活动详情
     * https://op.jinritemai.com/docs/api-docs/61/1797
     * @param array $params
     * [
     *  activity_id    Int64   是  活动ID
     * ]
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinShopActivityDetail(array $params)
    {
        return $this->app->http->post('buyin/shopActivityDetail', $params, false);
    }

    /**
     * 商品团长活动提报接口 支持店铺授权将抖店商品申请提报到团长活动中
     * https://op.jinritemai.com/docs/api-docs/61/744
     * @param array $params
     * [
     *  activity_id                 Int64    是  活动ID
     *  phone_number                String   是  店铺联系电话
     *  products [
     *    [
     *       product_id             Int64    是  商品ID
     *       activity_price         Int64    是  活动价（单位分）
     *       promotion_stock        Int64    否  参与活动库存
     *       gift_info              String   否  赠品（15个字以内，填写可提供赠品详情）
     *       promotion_step         String   否  活动价实现方式（15个字以内，如满减、提供优惠券、拍立减、限时活动价）
     *       product_activity_ratio String   否  佣金比例，设置范围[1%,50%]不小于改团长活动设置佣金率（支持两位小数）
     *       promotion_end_time     String   否  商品推广结束时间（不传默认为当前时间往后数90天）
     *       months_of_protection   Int64    否  开启独家保护的时长。单位：月；范围：[0,12]，0表示不开启
     *     ]
     *   ]
     *  service_ratio               String   否  招商服务费率。 服务费率+佣金率小于90（必须为两位小数）
     * ]
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinApplyActivities(array $params)
    {
        return $this->app->http->post('buyin/applyActivities', $params, false);
    }

    /**
     * 延长推广待处理/已处理记录查询 查询商家待处理/已处理的延长推广列表
     * https://op.jinritemai.com/docs/api-docs/61/1674
     * @param array $params
     * [
     *  page         Int64   是  当前页
     *  page_size    Int64   是  每页条数（最大20）
     *  search_type  Int64   否  查询类型（0:查询待处理申请，1:查询已处理申请）
     *  activity_id  Int64   否  活动 id
     * ]
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinActivityProductExtendList(array $params)
    {
        return $this->app->http->post('buyin/activityProductExtendList', $params, false);
    }

    /**
     * 商家处理团长活动商品的推广延期申请
     * https://op.jinritemai.com/docs/api-docs/61/1673
     * @param array $params
     * [
     *  activity_id    Int64   是  活动ID
     *  product_id     Int64   是  商品
     *  status         Int64   是  延长推广的审批状态。1：审核通过；2：审核拒绝
     * ]
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinActivityProductExtendApprove(array $params)
    {
        return $this->app->http->post('buyin/activityProductExtendApprove', $params, false);
    }

    /**
     * 查询商品 SKU
     * https://op.jinritemai.com/docs/api-docs/61/1626
     * @param array $params
     * [
     *  product_id     Int64   是  商品
     * ]
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getBuyinProductSkus(array $params)
    {
        return $this->app->http->post('buyin/productSkus', $params, false);
    }

}
