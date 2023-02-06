# open-doudian

## 安装 - install

```bash
$ composer require tb07/doudian
```

## 使用 - usage

```php
require 'vendor/autoload.php';

$app = new Tb07\DouDian\DouDian([  
            'debug' => true,
            'app_key' => 'your app key',
            'app_secret' => 'your app secret',
            'service_id' => 'your service id'
]);

// 创建授权
$app->auth->generateAuthUrl('https://www.test.com/authorization');

// 部分API没有封装成具体方法，你也可以自行调用 request 方法
$app->http->request('请求方式','方法', ['参数'=> '值'],'授权凭证');
```

## 测试 - tests

1. 复制 phpunit.xml 配置文件
    ```bash
    $ cp example.phpunit.xml phpunit.xml
    ```
2. 修改配置文件环境变量部分
    ```xml
    <php>
        <env name="douDian.app_key" value="your app key"/>
        <env name="douDian.app_secret" value="your app secret"/>
        <env name="douDian.service_id" value="your sign Secret id"/>
        <env name="douDian.adZoneId" value="your ad zone id"/>
    </php>
    ```
3. 执行测试用例
    ```bash
    $ vendor/bin/phpunit

