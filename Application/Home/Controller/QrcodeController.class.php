<?php
namespace Home\Controller;

class QrcodeController extends ServerController {
    public function temporary()
    {
        $result = $this->app->qrcode->temporary('aaaaaaaaaaaaaaaa', 6 * 24 * 3600);
        echo "<pre>";
        print_r($result);
    }

    public function url()
    {
        $url = $this->app->qrcode->url('gQGE7zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyVzBWWlFIenlhTlAxMGl3XzFxY3QAAgQSNzdaAwQA6QcA');
        echo $url;
    }
}