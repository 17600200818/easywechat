<?php
//require(__DIR__ . '/vendor/autoload.php');
namespace Home\Controller;
use Think\Controller;
//include_once vendor/autoload.php;
//require_once('autoload.php');
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

	$app->server->push(function($message){
		switch ($message['MsgType']) {
        case 'event':
            return '收到事件消息';
            break;
        case 'text':
            return $message['Content'];
            break;
        case 'image':
            return '收到图片消息';
            break;
        case 'voice':
            return '收到语音消息';
            break;
        case 'video':
            return '收到视频消息';
            break;
        case 'location':
            return '收到坐标消息';
            break;
        case 'link':
            return '收到链接消息';
            break;
        // ... 其它消息
        default:
            return '收到其它消息';
            break;
    }
	});

        $response = $app->server->serve();

	// 将响应输出
        $response->send(); // Laravel 里请使用：return $response;
    }

    public function sendMsg()
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

	$broadcast = $app->broadcasting;
	$broadcast->sendText('嘎哈嘎哈嘎哈');
    }

}
