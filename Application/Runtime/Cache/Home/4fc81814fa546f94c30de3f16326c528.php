<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>文档标题</title>
    <link rel="stylesheet" href="https://weui.io/weui.css">
    <link rel="stylesheet" href="https://weui.io/example.css">
    <script src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
</head>

<body>
<img src="" alt="" id="Img" style="width: 100%">
<a href="#" id="chooseImage" class="weui-btn weui-btn_primary">上传图片</a>
<a href="#" id="StartRecord" class="weui-btn weui-btn_primary">开始录音</a>
<a href="#" id="StopRecord" class="weui-btn weui-btn_primary">停止录音</a>
<script>
    //    alert(location.href.split('#')[0]);
    wx.config({
        debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: "<?php echo ($appid); ?>", // 必填，公众号的唯一标识
        timestamp: <?php echo ($signArr["timestamp"]); ?>, // 必填，生成签名的时间戳
        nonceStr: '<?php echo ($signArr["noncestr"]); ?>', // 必填，生成签名的随机串
        signature: '<?php echo ($signArr["signature"]); ?>',// 必填，签名，见附录1
        jsApiList: ['onMenuShareTimeline', 'onMenuShareAppMessage', 'chooseImage', 'previewImage', 'uploadImage', 'downloadImage', 'startRecord'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });

    wx.error(function(res){
        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
    });
</script>
<script>
//    alert(location.href.split('#')[0]);
//    wx.config({
//        debug: true, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
//        appId: "<?php echo ($appid); ?>", // 必填，公众号的唯一标识
//        timestamp: <?php echo ($signArr["timestamp"]); ?>, // 必填，生成签名的时间戳
//        nonceStr: '<?php echo ($signArr["noncestr"]); ?>', // 必填，生成签名的随机串
//        signature: '<?php echo ($signArr["signature"]); ?>',// 必填，签名，见附录1
//        jsApiList: ['onMenuShareTimeline'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
//    });
//
//    wx.error(function(res){
//        // config信息验证失败会执行error函数，如签名过期导致验证失败，具体错误信息可以打开config的debug模式查看，也可以在返回的res参数中查看，对于SPA可以在这里更新签名。
//    });

    wx.ready(function(){
        // config信息验证后会执行ready方法，所有接口调用都必须在config接口获得结果之后，config是一个客户端的异步操作，所以如果需要在页面加载时就调用相关接口，则须把相关接口放在ready函数中调用来确保正确执行。对于用户触发时才调用的接口，则可以直接调用，不需要放在ready函数中。

        //分享到朋友圈
        wx.onMenuShareTimeline({
            title: '测试分享到朋友圈', // 分享标题
            link: location.href.split('#')[0], // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513850683&di=bfc9ec111a91302abf0b5bf2d1e84e59&imgtype=jpg&er=1&src=http%3A%2F%2Fpic23.nipic.com%2F20120823%2F6772262_113606778000_2.jpg', // 分享图标
            success: function () {
                // 用户确认分享后执行的回调函数
                alert('success');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                alert('cancel')
            }
        });

        //分享给朋友
        wx.onMenuShareAppMessage({
            title: '测试分享给朋友', // 分享标题
            desc: '就分享了咋得', // 分享描述
            link: location.href.split('#')[0], // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1513850683&di=bfc9ec111a91302abf0b5bf2d1e84e59&imgtype=jpg&er=1&src=http%3A%2F%2Fpic23.nipic.com%2F20120823%2F6772262_113606778000_2.jpg', // 分享图标
//            type: 'video', // 分享类型,music、video或link，不填默认为link
//            dataUrl: 'http://player.youku.com/embed/XMjk0MTU1MjA0MA==', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                // 用户确认分享后执行的回调函数
                alert('success');
            },
            cancel: function () {
                // 用户取消分享后执行的回调函数
                alert('cancel');
            }
        });

        $('#chooseImage').click(function () {
            //拍照或从手机相册中选图接口
            wx.chooseImage({
                count: 1, // 默认9
                sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
                sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
                success: function (res) {
                    var localIds = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
//                    alert(localIds);
//                    $('#Img').attr('src', localIds);

                    //预览图片接口
//                    wx.previewImage({
//                        current: localIds[0], // 当前显示图片的http链接
//                        urls: localIds // 需要预览的图片http链接列表
//                    });

                    //上传图片接口
                    wx.uploadImage({
                        localId: localIds[0], // 需要上传的图片的本地ID，由chooseImage接口获得
                        isShowProgressTips: 1, // 默认为1，显示进度提示
                        success: function (res) {
                            var serverId = res.serverId; // 返回图片的服务器端ID

                            //下载图片接口
                            wx.downloadImage({
                                serverId: serverId, // 需要下载的图片的服务器端ID，由uploadImage接口获得
                                isShowProgressTips: 1, // 默认为1，显示进度提示
                                success: function (res) {
                                    var localId = res.localId; // 返回图片下载后的本地ID
                                }
                            });
                        }
                    });
                }
            });
        });

        $('#StartRecord').click(function () {
            wx.startRecord();

            // 录音时间超过一分钟没有停止的时候会执行 complete 回调
            wx.onVoiceRecordEnd({
                complete: function (res) {
                    var localId = res.localId;
                    alert('自动停止');
                }
            });
        });

        $('#StopRecord').click(function () {
            wx.stopRecord({
                success: function (res) {
                    var localId = res.localId;
                }
            });
        });
    });
</script>
</body>

</html>