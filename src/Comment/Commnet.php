<?php

/*
 * Author: cc
 *  Created by PhpStorm.
 *  Copyright (c)  cc Inc. All rights reserved.
 */

namespace Tb07\DouDian\Comment;

use Tb07\DouDian\Core\BaseService;

class Commnet extends BaseService
{
    //获取店铺的评论列表 getCommentList()
    public function getCommentList(array $params)
    {
        return $this->app->http->post('comment/list', $params);
    }

    //评价回复 replyComment()
    public function replyComment(array $params)
    {
        return $this->app->http->post('comment/reply', $params);
    }
}
