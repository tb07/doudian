<?php


namespace Tb07\DouDian\Buyin\Inst;

use Tb07\DouDian\Core\BaseService;

/**
 * 商品选品来源
 * Class BuyinInst
 * @package Tb07\DouDian\Buyin\Inst
 */
class BuyinInst extends BaseService
{

    /**
     * 商品选品来源转链
     * https://op.jinritemai.com/docs/api-docs/61/1454
     * @param array $params
     * [
     *  product_url     String   是  商品链接
     *  pick_extra      String   否  自定义参数
     * ]
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getInstPickSourceConvert(array $params)
    {
        return $this->app->http->post('/buyin/instPickSourceConvert', $params, false);
    }

    /**
     * 选品订单明细查询接口
     * https://op.jinritemai.com/docs/api-docs/61/2008
     * @param array $params
     * [
     *  size            Int64    否  每页订单数目，取值区间： [1, 100]
     *  cursor          String   否  下一页索引（第一页传“0”）
     *  start_time      String   否  支付时间开始，最早支持2022年01月01日
     *  end_time        String   否  支付时间结束，该时间不能超过start_time+90
     *  product_id      String   否  商品ID
     *  search_type     String   否  查询粒度（1-查询当前应用，2-查询应用所属工具服务商，不包括抖音应用选品GMV数据）
     *  order_ids       String   否  订单号。多个订单号用英文 "," 分隔，最多支持100个订单号
     * ]
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function getiInstituteOrderPick(array $params)
    {
        return $this->app->http->post('/buyin/instituteOrderPick', $params, false,false);
    }

}
