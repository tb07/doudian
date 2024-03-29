<?php

namespace Tb07\DouDian\Alliance\User;

use Tb07\DouDian\Core\BaseService;

class AllianceAuth extends BaseService
{
    protected $host = 'https://open.douyin.com';

    /**
     * 达人授权地址 URL.
     *
     * @return string
     */
    public function generateAuthUrl(string $state, string $scope, string $redirect_uri)
    {
        $url   = $this->host . '/platform/oauth/connect';
        $query = [
            'client_key'    => $this->app->getAppKey(),
            'response_type' => 'code',
            'scope'         => $scope,
            'redirect_uri'  => $redirect_uri,
            'state'         => $state,
            't'             => time(),
        ];

        return $url . '?' . http_build_query($query);
    }

    /**
     * 请求获取 access_token.
     *
     * @param $code
     * @return mixed
     * @see https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-permission/refresh-token
     */
    public function requestAccessToken($code)
    {
        $params   = [
            'client_secret' => $this->app->getAppSecret(),
            'client_key'    => $this->app->getAppKey(),
            'code'          => $code,
            'grant_type'    => 'authorization_code',
        ];
        $headers  = $this->headers();
        $options  = [
            'json' => $params,
        ];
        $endpoint = '/oauth/access_token/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options, $headers);
        return $result;
    }

    /**
     * 刷新 access_token
     * 如果refresh_token也过期了，则只能让商家点击“使用”按钮，会打开应用使用地址，
     * 地址参数里会带上新的授权code。然后用新的code，重新调接口，获取新的access_token。
     *
     * @see https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-permission/refresh-token
     * @param $refresh_token
     *
     * @return mixed
     */
    public function refreshAccessToken($refresh_token)
    {
        $params   = [
            'client_key'    => $this->app->getAppKey(),
            'refresh_token' => $refresh_token,
            'grant_type'    => 'refresh_token',
        ];
        $headers  = $this->headers();
        $options  = [
            'json' => $params,
        ];
        $endpoint = '/oauth/refresh_token/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options);
        return $result;
    }

    /**
     * 刷新 通过旧的 refresh_token 获取新的 refresh_token，调用后旧 refresh_token 会失效，新 refresh_token 有 30 天有效期。最多只能获取 5 次新的 refresh_token，5 次过后需要用户重新授权。
     * @see https://developer.open-douyin.com/docs/resource/zh-CN/dop/develop/openapi/account-permission/refresh-token
     * @param $refresh_token
     * @return mixed
     */
    public function renewRefreshToken($refresh_token)
    {
        $params   = [
            'client_key'    => $this->app->getAppKey(),
            'refresh_token' => $refresh_token,
        ];
        $headers  = $this->headers();
        $options  = [
            'json' => $params,
        ];
        $endpoint = '/oauth/renew_refresh_token/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options);
        return $result;
    }

    /**
     * 获取用户信息
     * @param $openid
     * @return mixed
     */
    public function getUserInfo($openid)
    {
        $params   = [
            'open_id'      => $openid,
            'access_token' => $this->app->getAccessToken(),
        ];
        $headers  = $this->headers();
        $options  = [
            'json' => $params,
        ];
        $endpoint = '/oauth/userinfo/';
        $url      = $this->host . $endpoint;
        $result   = $this->app->http->cusRequest('post', $url, $options, $headers);
        return $result;
    }

    protected function headers()
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
