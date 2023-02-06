<?php


namespace Tb07\DouDian\Order;

use Tb07\DouDian\Core\BaseService;

class Plan extends BaseService
{
    //创建/修改商品普通计划
    public function createBuyinSimplePlan(array $params)
    {
        return $this->app->http->post('buyin/simplePlan', $params);
    }

    //创建/修改商品定向计划
    public function createBuyinCreateOrUpdateOrienPlan(array $params)
    {
        return $this->app->http->post('buyin/createOrUpdateOrienPlan', $params);
    }

    //商品定向计划查询
    public function getBuyinOrienPlanLis(array $params)
    {
        return $this->app->http->post('buyin/orienPlanLis', $params);
    }

    //商品定向计划管理 支持商家关闭/删除/恢复 定向计划。 注意：1. 关闭进行中的定向计划 自然日T+1生效（东八区）；2. 删除过期的定向计划实时生效，不能删除正在进行中的定向计划。
    public function setBuyinOrienPlanCtrl(array $params)
    {
        return $this->app->http->post('buyin/orienPlanCtrl', $params);
    }

    //查询定向计划作者列表。
    public function getBuyinOrienPlanAuthors(array $params)
    {
        return $this->app->http->post('buyin/orienPlanAuthors', $params);
    }

    //向指定定向计划中添加达人
    public function addBuyinOrienorienPlanAuthors(array $params)
    {
        return $this->app->http->post('buyin/orienPlanAuthorsAdd', $params);
    }

    //定向计划达人申请审核
    public function auditBuyinOrienPlanAudit(array $params)
    {
        return $this->app->http->post('buyin/orienPlanAudit', $params);
    }

    //创建/修改商品专属推广计划
    public function setBuyinExclusivePlan(array $params)
    {
        return $this->app->http->post('buyin/exclusivePlan', $params);
    }

    //创建/修改商品专属推广计划
    public function setBuyinExclusivePlanAuthorOperate(array $params)
    {
        return $this->app->http->post('buyin/exclusivePlanAuthorOperate', $params);
    }
}
