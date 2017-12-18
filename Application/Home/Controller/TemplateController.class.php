<?php
namespace Home\Controller;

class TemplateController extends ServerController {
    public function setIndustry()
    {
        $this->app->template_message->setIndustry(1, 4);
    }

    public function addTemplate()
    {
        $this->app->template_message->addTemplate('TM00015');
    }

    public function getIndustry()
    {
        $this->app->template_message->getIndustry();
    }

    public function getPrivateTemplate()
    {
        $this->app->template_message->getPrivateTemplates();
    }

    public function deletePrivateTemplate()
    {
        $this->app->template_message->deletePrivateTemplate('1B4dtDX0G30M0rvEe59EQhuU43Z_8wYv0FzcroWpKBs');
    }

    public function send()
    {
        $this->app->template_message->send([
            'touser' => 'oY-Kxs67AcrRzCusHAD1M8z4QwfU',
            'template_id' => '889iIctDkT5lVZv1ETu7Ip34WuF92RRnhLsaXGThx0o',
            'url' => 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513528276007&di=511fe8d9b405bfa870158cfaabe85642&imgtype=0&src=http%3A%2F%2Fimg.pconline.com.cn%2Fimages%2Fupload%2Fupc%2Ftx%2Fpcdlc%2F1612%2F07%2Fc325%2F31709108_1481113045919.jpg',
            'data' => [
                'first' => '123',
                'orderMoneySum' => '99999999元',
                'orderProductName' => '12123',
                'Remark' => '123123',
            ],
        ]);
    }

    public function sendSubScription()
    {
        $this->app->template_message->sendSubscription([
            'touser' => 'oY-Kxs67AcrRzCusHAD1M8z4QwfU',
            'template_id' => '4UBiQf7hPwCqJQ-Nq8xizc4fxBpzFayWq78ghAhPP8g',
            'url' => 'https://www.baidu.com',
            'scene' => 1000,
            'data' => [
//                'key1' => 'VALUE',
//                'key2' => 'VALUE2',
            ],
        ]);
    }
}