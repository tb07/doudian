<?php

namespace DouDian\Tests\Unit;

use DouDian\Tests\TestCase;

class DouDian extends TestCase
{
    protected $accessToken = 'b30e0a8d-4049-4739-962b-0889bf8d2cfe';

    public function testInvestmentActivityOpenList()
    {
        $params = ['product_id' => ''];
//        $response = $service->Shop->getProductListV2([]);
        $result = $this->getApp()->product->getProduct($params);
        print_r($result);
        exit;
        $this->assertOk($result);
    }

}