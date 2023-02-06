<?php

namespace DouDian\Tests;

use Tb07\DouDian\DouDian;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected $app;

    public function getApp()
    {
        return $this->app ?: $this->app = new DouDian([
            'debug'      => true,
            'app_key'    => getenv('douDian.app_key'),
            'app_secret' => getenv('douDian.app_secret'),
            'service_id' => getenv('douDian.service_id'),
        ]);
    }

    public function assertOk(array $result)
    {
        if (!isset($result['error_msg']) || empty($result['error_msg'])) {
            $this->assertTrue(true);
        } else {
            $this->assertTrue(false, $result['sub_msg'] ?? $result['error_msg'] ?? $result['error'] ?? '');
        }

    }
}