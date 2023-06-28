<?php

namespace Tb07\DouDian\Alliance;

use Tb07\DouDian\Core\BaseService;

class AllianceOauth extends BaseService
{
    protected $host = 'https://open.douyin.com';

    /**
     *应用调用凭证
     * @return string
     */
    public function getClientToken()
    {
        $params = [
            'client_key'    => $this->app->getAppKey(),
            'client_secret' => $this->app->getAppSecret(),
            'grant_type'    => 'client_credential',
        ];

        $options  = [
            'json' => $params,
        ];
        $endpoint = '/oauth/client_token/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options);
        return $result;
    }

    /**
     *应用调用凭证
     * @return string
     */
    public function getJsGetticket()
    {
        $headers  = $this->headers();
        $endpoint = '/js/getticket/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('get', $url, [], $headers);
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
