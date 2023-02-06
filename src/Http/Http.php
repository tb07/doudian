<?php

namespace Tb07\DouDian\Http;

use Tb07\DouDian\DouDian;
use Psr\Http\Message\RequestInterface;

class Http extends Client
{
    /** @var DouDian */
    protected $app;

    public function __construct(DouDian $app)
    {
        $this->app = $app;
    }

    /**
     * 发送 post 请求
     * @param string $endpoint
     * @param array $params
     * @param array $headers
     * @param false $returnRaw
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function post($endpoint, array $params = [], $headers = [], $returnRaw = false)
    {
        $params = $this->generateParams($endpoint, $params);
        if ($headers) {
            $this->addMiddleware($this->headerMiddleware($headers));
        }
        $url = $this->app->getBaseUri() . $endpoint;
        return $this->unwrapResponse(parent::post($url, $params), $returnRaw);
    }

    /**
     * 发送 get 请求
     * @param string $endpoint
     * @param array $params
     * @param array $headers
     * @param false $returnRaw
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \Tb07\DouDian\Exception\HttpException
     */
    public function get($endpoint, array $params = [], $headers = [], $returnRaw = false)
    {
        $params = $this->generateParams($endpoint, $params);
        if ($headers) {
            $this->addMiddleware($this->headerMiddleware($headers));
        }
        $url = $this->app->getBaseUri() . $endpoint;
        return $this->unwrapResponse(parent::get($url, $params), $returnRaw);
    }

    /**
     * 用 json 的方式发送 post 请求
     * @param $endpoint
     * @param array $params
     * @param array $headers
     * @param false $returnRaw
     * @return mixed
     */
    public function postJosn($endpoint, array $params = [], $headers = [], $returnRaw = false)
    {
        $params = $this->generateParams($endpoint, $params);
        if ($headers) {
            $this->addMiddleware($this->headerMiddleware($headers));
        }
        $url = $this->app->getBaseUri() . $endpoint;
        return $this->unwrapResponse(parent::post($url, $params), $returnRaw);
    }

    protected function headerMiddleware($headers)
    {
        return function (callable $handler) use ($headers) {
            return function (RequestInterface $request, array $options) use ($handler, $headers) {
                foreach ($headers as $key => $header) {
                    $request = $request->withHeader($key, $header);
                }

                return $handler($request, $options);
            };
        };
    }

    /**
     * 统一转换响应结果为 json 格式.
     *
     * @param $response
     */
    protected function unwrapResponse($response, $returnRaw)
    {
        $contentType = $response->getHeaderLine('Content-Type');
        $contents    = $response->getBody();
        if ($returnRaw) {
            return $contents;
        }
        if (false !== stripos($contentType, 'json') || stripos($contentType, 'javascript')) {
            return json_decode($contents, true);
        } elseif (false !== stripos($contentType, 'xml')) {
            return json_decode(json_encode(simplexml_load_string($contents)), true);
        }

        return $contents;
    }


    /**
     * 组合公共参数、业务参数.
     *
     * @see https://op.jinritemai.com/docs/guide-docs/10/23
     *
     * @param string $url 支持 /shop/brandList 或者 shop/brandList 格式
     * @param array $params 业务参数
     */
    public function generateParams(string $url, array $params, $isAccessToken = true)
    {
        $method = ltrim(str_replace('/', '.', $url), '.');
        //公共参数
        $publicParams = [
            'method'      => $method,
            'app_key'     => $this->app->getAppKey(),
            'timestamp'   => date('Y-m-d H:i:s'),
            'v'           => '2',
            'sign_method' => 'md5',
        ];
        if ($isAccessToken) {
            $publicParams['access_token'] = $this->app->getAccessToken();
        }
        //业务参数
        ksort($params);
        $params_json = \json_encode((object)$params, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        $string = 'app_key' . $publicParams['app_key'] . 'method' . $method . 'param_json' . $params_json . 'timestamp' . $publicParams['timestamp'] . 'v' . $publicParams['v'];
        $md5Str = $this->app->getAppSecret() . $string . $this->app->getAppSecret();
        $sign   = md5($md5Str);

        return array_merge($publicParams, [
            'param_json' => $params_json,
            'sign'       => $sign,
        ]);
    }
}