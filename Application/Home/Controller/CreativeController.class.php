<?php
namespace Home\Controller;

class CreativeController extends ServerController {
    public function UploadImg()
    {
        $response = $this->app->media->uploadImage($_SERVER['DOCUMENT_ROOT'].'/Public/test.jpg');

        echo "<pre>";
        print_r($response);
    }

    public function getList()
    {
        $response = $this->app->material->list('voice', 0, 20);
        echo "<pre>";
        print_r($response);
    }
}