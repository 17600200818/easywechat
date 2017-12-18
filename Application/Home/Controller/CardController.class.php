<?php
namespace Home\Controller;

class CardController extends ServerController {
    public $card;

    public function __construct()
    {
        parent::__construct();
        $this->card = $this->app->card;
    }

    public function getColors()
    {
        $response = $this->card->colors();
        echo "<pre>";
        print_r($response);
    }

    public function getCategories()
    {
        $response = $this->card->categories();
        echo "<pre>";
        print_r($response);
    }

    public function create()
    {
        $cardType = 'GROUPON';
        $attributes = [
            'base_info' => [
                "logo_url"=> "http://mmbiz.qpic.cn/mmbiz/iaL1LJM1mF9aRKPZJkmG8xXhiaHqkKSVMMWeN3hLut7X7hicFNjakmx ibMLGWpXrEXB33367o7zHN0CwngnQY7zb7g/0",
                "brand_name"=>"微信餐厅",
                "code_type"=>"CODE_TYPE_TEXT",
                "title"=> "132元双人火锅套餐",
                "sub_title"=> "周末狂欢必备",
                "color"=> "Color010",
                "notice"=> "使用时向服务员出示此券",
                "service_phone"=> "020-88888888",
                "description"=> "不可与其他优惠同享\n如需团购券发票，请在消费时向商户提出\n店内均可使用，仅限堂食",
                "date_info"=> array(
                    "type"=> "DATE_TYPE_FIX_TERM",
                    "fixed_term"=> 15 ,
                    "fixed_begin_term"=> 0
                ),
                "sku"=> array(
                    "quantity"=> 500000
                ),
                "get_limit"=> 3,
                "use_custom_code"=> false,
                "bind_openid"=> false,
                "can_share"=> true,
                "can_give_friend"=> true,
                "location_id_list" => [123, 12321, 345345],
                "custom_url_name"=> "立即使用",
                "custom_url"=> "http://www.qq.com",
                "custom_url_sub_title"=> "6个汉字tips",
                "promotion_url_name"=> "更多优惠",
                "promotion_url"=> "http://www.qq.com"
            ],

            "deal_detail"=> "以下锅底2选1（有菌王锅、麻辣锅、大骨锅、番茄锅、清补凉锅、酸 菜鱼锅可选）：\n大锅1份 12元\n小锅2份 16元 "
        ];

        $response = $this->card->create($cardType, $attributes);
        echo "<pre>";
        print_r($response);
    }

    public function get()
    {
        $response = $this->card->get('pY-Kxs8FHlVQFCdGMBb4boJOYAYA');
        echo "<pre>";
        print_r($response);
    }

    public function createQrcode()
    {
        // 领取单张卡券
        $cards = [
            'action_name' => 'QR_CARD',
            'expire_seconds' => 1800,
            'action_info' => [
                'card' => [
                    'card_id' => 'pY-Kxs8FHlVQFCdGMBb4boJOYAYA',
                    'is_unique_code' => false,
                    'outer_id' => 1222,
                ],
            ],
        ];

        $response = $this->card->createQrCode($cards);
        echo "<pre>";
        print_r($response);
    }

    public function createLandingPage()
    {
        $banner = 'http://mmbiz.qpic.cn/mmbiz/iaL1LJM1mF9aRKPZJkmG8xXhiaHqkKSVMMWeN3hLut7X7hicFN';
        $pageTitle = '惠城优惠大派送';
        $canShare  = true;

        //SCENE_NEAR_BY          附近
        //SCENE_MENU             自定义菜单
        //SCENE_QRCODE             二维码
        //SCENE_ARTICLE             公众号文章
        //SCENE_H5                 h5页面
        //SCENE_IVR                 自动回复
        //SCENE_CARD_CUSTOM_CELL 卡券自定义cell
        $scene = 'SCENE_NEAR_BY';

        $cardList = [
            ['card_id' => 'pY-Kxs8FHlVQFCdGMBb4boJOYAYA', 'thumb_url' => 'http://test.digilinx.cn/wxApi/Uploads/test.png'],
        ];

        $result = $this->card->createLandingPage($banner, $pageTitle, $canShare, $scene, $cardList);
        echo "<pre>";
        print_r($result);
    }

    public function getHtml()
    {
        $result = $this->card->getHtml('pY-Kxs8FHlVQFCdGMBb4boJOYAYA');
        echo "<pre>";
        print_r($result);
    }

    public function getUserCards()
    {
        $result = $this->card->getUserCards('oY-Kxs67AcrRzCusHAD1M8z4QwfU', '');
        echo "<pre>";
        print_r($result);
    }
}