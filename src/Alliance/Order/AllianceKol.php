<?php

namespace Tb07\DouDian\Alliance\Order;

use Tb07\DouDian\Core\BaseService;

class AllianceKol extends BaseService
{
    protected $host = 'https://open.douyinec.com';


    /**
     * https://buyin.jinritemai.com/dashboard/service-provider/doc-center?docId=2172&platform=1
     * @param array $params
     * [
     *  size                Int64    否  每页条数
     *  cursor              String   否  下一页索引（首次请求时参数不传）
     *  start_time          String   否  2006-01-02 15:04:05    支付时间开始，最早支持90天前
     *  end_time            String   否  2006-01-02 15:04:05    支付时间结束
     *  time_type           String   否  查询时间类型。pay: 支付时间（默认）; update：联盟侧更新时间，非订单状态更新时间
     *  order_ids           String   否  订单号。多个订单号用英文,分隔，最多支持10个订单号
     * ]
     * 获得用户订单
     * @return mixed
     */
    public function getUserOrderList($params, $openId)
    {
        $headers  = $this->headers();
        $endpoint = '/alliance/kol/orders/';
        $url      = $this->host . $endpoint;
        $options  = [
            'json'  => $params,
            'query' => [
                'open_id' => $openId,
            ],
        ];
        $result   = $this->app->http->cusRequest('post', $url, $options, $headers);
        return $result;
    }

    /**
     * https://buyin.jinritemai.com/dashboard/service-provider/doc-center?docId=2328&platform=1
     * @param array $params
     * [
     *  open_id                string    是  用户唯一标志
     * ]
     * 查询达人的带货口碑和橱窗销量
     * @return mixed
     */
    public function getUserReputation($params)
    {
        $headers  = $this->headers();
        $options  = [
            'query' => $params,
        ];
        $endpoint = '/alliance/kol/reputation/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options, $headers);
        return $result;
    }

    /**
     * https://buyin.jinritemai.com/dashboard/service-provider/doc-center?docId=2319&platform=1
     * @param array $params
     * [
     *  products               array     是  用户唯一标志 商品信息，最多20个商品
     *  need_hide              bool      是  是否隐藏（true代表隐藏，false代表显示）
     *  pick_extra             string    是  自定义参数，携带到订单（只允许 数字、字母和_，限制长度为20）
     *  keep_picksource        string    是  是否保留商品链接原有选品来源，默认不保留（加橱窗时默认会生成新的选品来源参数覆盖旧参数，转链的自定义参数也会失效，此时选品来源为当前加橱窗应用），keep_picksource 为 true 时保留原有选品来源
     * ]
     * 添加商品(精选联盟商品)到达人橱窗，需要用户授权。
     * @param $openid
     * @return mixed
     */
    public function userStoreAdd($params, $open_id)
    {
        $headers  = $this->headers();
        $options  = [
            'json'  => $params,
            'query' => [
                'open_id' => $open_id,
            ],
        ];
        $endpoint = '/alliance/store/add/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options, $headers);
        return $result;
    }

    /**
     * https://buyin.jinritemai.com/dashboard/service-provider/doc-center?docId=2322
     * @param array $params
     * [
     *  products               JSON     是  商品数据[{"product_id":"3450632721376902816","promotion_id":"3450632721374033833"}]
     * ]
     * 达人橱窗商品删除，需要用户授权。
     * @param $openid
     * @return mixed
     */
    public function userStoreRemove($params, $open_id)
    {
        $headers  = $this->headers();
        $options  = [
            'json'  => $params,
            'query' => [
                'open_id' => $open_id,
            ],
        ];
        $endpoint = '/alliance/kol/store/remove/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options, $headers);
        return $result;
    }

    /**
     * https://buyin.jinritemai.com/dashboard/service-provider/doc-center?docId=2320
     * @param array $params
     * [
     *  page               int60     是  分页[1,20]
     *  page_size          int64     是  每页的数量（小于等于20）
     * ]
     * 橱窗商品，需要用户授权。
     * @param $openid
     * @return mixed
     */
    public function userStoreList($params, $open_id)
    {
        $headers  = $this->headers();
        $options  = [
            'json'  => $params,
            'query' => [
                'open_id' => $open_id,
            ],
        ];
        $endpoint = '/alliance/kol/store/list/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options, $headers);
        return $result;
    }

    /**
     * https://buyin.jinritemai.com/dashboard/service-provider/doc-center?docId=2339&platform=1
     * @param string $open_id
     * 获取达人百应id
     * @param $openid
     * @return mixed
     */
    public function userBuyinId($open_id)
    {
        $headers  = $this->headers();
        $options  = [
            'query' => ['open_id' => $open_id],
        ];
        $endpoint = '/alliance/kol/buyin_id/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options, $headers);
        return $result;
    }

    /**
     * https://buyin.jinritemai.com/dashboard/service-provider/doc-center?docId=2337
     * @param array $params
     * [
     *  page               int60     是  分页[1,20]
     *  page_size          int64     是  每页的数量（小于等于20）
     * ]
     * 接口用于查询机构单天选品订单号和订单GMV 主要是用于获取自定义数据
     * @param $openid
     * @return mixed
     */
    public function isvPickOrder($params)
    {
        $headers  = $this->headers();
        $options  = [
            'json' => $params,
        ];
        $endpoint = '/alliance/isv/pick_order/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options, $headers);
        return $result;
    }

    protected function headers()
    {
        return [
            'access-token' => $this->app->getAccessToken(),
            'Content-Type' => 'application/json',
        ];
    }
}
