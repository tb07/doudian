<?php


namespace Tb07\DouDian\Insurance;

use Tb07\DouDian\Core\BaseService;

class Insurance extends BaseService
{
    //获取运费险保单详情 insurance()
    public function insurance(array $params)
    {
        return $this->app->http->post('order/insurance', $params);
    }
}
