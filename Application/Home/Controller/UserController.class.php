<?php
namespace Home\Controller;

class UserController extends ServerController {
    public function get()
    {
        $user = $this->app->user->get('oY-Kxs0j6F6R2G1phQIb3zUBLDbQ');
        echo "<pre>";
        print_r($user);
    }

    public function getList()
    {
        $list = $this->app->user->list();
        echo "<pre>";
        print_r($list);
    }
}