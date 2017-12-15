<?php
namespace Home\Controller;
use Think\Controller;
include_once vendor/autoload.php;
use EasyWeChat\Factory;

class ServerController extends Controller {
    public function index()
    {
        $config = [
            'app_id' => C('AppID'),
            'secret' => C('appsecret'),

            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file' => __DIR__.'/wechat.log',
            ],
        ];

        $app = Factory::officialAccount($config);

        $response = $app->server->serve();

// 将响应输出
        $response->send(); // Laravel 里请使用：return $response;
    }
}