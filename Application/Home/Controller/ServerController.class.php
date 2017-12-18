<?php
namespace Home\Controller;
use Think\Controller;
use EasyWeChat\Factory;

class ServerController extends Controller {
    public $app;

    public function __construct()
    {
        parent::__construct();
        $config = [
            'app_id' => C('AppID'),
            'secret' => C('appsecret'),

            'response_type' => 'array',

            'log' => [
                'level' => 'debug',
                'file' => __DIR__.'/wechat.log',
            ],
        ];

        $this->app = $app = Factory::officialAccount($config);
    }

    public function index()
    {
        $this->app->server->push(function($message){
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

        $response = $this->app->server->serve();

	    // 将响应输出
        $response->send(); // Laravel 里请使用：return $response;
    }

    public function sendMsg()
    {
        $broadcast = $this->app->broadcasting;
        $broadcast->sendText('嘎哈嘎哈嘎哈');
    }

    public function curlPost($url, $post_data)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // post数据
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

        $output = curl_exec($ch);
        curl_close($ch);

        //打印获得的数据
        return json_decode($output, true);
    }

}
