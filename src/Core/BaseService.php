<?php


namespace Tb07\DouDian\Core;

use Tb07\DouDian\DouDian;

class BaseService
{
    protected $app;

    public function __construct(DouDian $app)
    {
        $this->app = $app;
    }
}
