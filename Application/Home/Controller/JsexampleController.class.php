<?php
namespace Home\Controller;

class JsexampleController extends ServerController {
    public function index()
    {
        $js = $this->app->jssdk->buildConfig(array('onMenuShareQQ', 'onMenuShareWeibo', 'chooseImage'), $debug = true, $beta = false, $json = true);

        $this->assign('js', $js);
        $this->display();
    }

}