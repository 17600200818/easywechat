<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
</head>
<body>
<form id="F" action="<?php echo ($url); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="media">
    <input type="submit" id="S">
</form>
<input type="text" id="I" value="<?php echo ($url); ?>">

<script>
//    $('#S').click(function () {
//        var formData = new FormData($( "#F" )[0]);
//        url = $('#I').val();
//        $.ajax({
//            url: url,
//            type: 'POST',
//            data: formData,
//            async: false,
//            cache: false,
//            contentType: false,
//            processData: false,
//            success: function (result) {
//                alert(result);
//            },
//            error: function (returndata) {
//                console.log(returndata);
//                return false;
//            }
//        });
//    });
</script>
</body>
</html>