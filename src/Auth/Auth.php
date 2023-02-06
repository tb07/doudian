<?php

namespace Tb07\DouDian\Auth;

use Tb07\DouDian\Core\BaseService;

class Auth extends BaseService
{
    /**
     * 店铺授权 URL.
     *
     * @return string
     */
    public function generateAuthUrl(string $state)
    {
        $url   = 'https://fuwu.jinritemai.com/authorize';
        $query = [
            'service_id' => $this->app->getServiceId(),
            'state'      => $state,
        ];

        return $url . '?' . http_build_query($query);
    }

    /**
     * 请求获取 access_token.
     *
     * @param $code
     *
     * @return mixed
     */
    public function requestAccessToken($code)
    {
        $params   = ['code' => $code, 'grant_type' => 'authorization_code',];
        $endpoint = 'token/create';
        $query    = $this->app->http->generateParams($endpoint, $params, false);
        $options  = ['headers' => [], 'query' => $query,];
        $url      = $this->app->getBaseUri() . $endpoint;
        $result   = $this->app->http->cusRequest('get', $url, $options);
        return $result;
    }

    /**
     * 刷新 access_token
     * 如果refresh_token也过期了，则只能让商家点击“使用”按钮，会打开应用使用地址，
     * 地址参数里会带上新的授权code。然后用新的code，重新调接口，获取新的access_token。
     *
     * @see https://op.jinritemai.com/help/faq/43/206
     *
     * @param $refresh_token
     *
     * @return mixed
     */
    public function refreshAccessToken($refresh_token)
    {
        $params   = ['refresh_token' => $refresh_token, 'grant_type' => 'refresh_token',];
        $endpoint = 'token/refresh';
        $query    = $this->app->http->generateParams('token/refresh', $params, false);
        $options  = ['headers' => [], 'query' => $query,];
        $url      = $this->app->getBaseUri() . $endpoint;

        $result = $this->app->http->cusRequest('get', $url, $options);

        return $result;
    }

}
