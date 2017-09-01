<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>新闻发布系统</title>
        <link rel="stylesheet" href="<?php echo base_url('application/views/css/weui.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('application/views/css/example.css'); ?>">
    </head>
    <body>
    <form action="" method="post">
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">新闻标题:</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text"  name="title"  id="title">
                </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">发布时间:</label></div>
                <div class="weui-cell__bd">
                     <input class="weui-input" type="text" placeholder="2017/8/31"  name="time" value="" id="time">
                </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">发布作者:</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="罗鑫"  name="author" value="" id="author">
                </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">新闻内容:</label></div>
        </div>
        <div class="weui-cells weui-cells_form" style="margin-top: -5px;">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea" placeholder="github教程" rows="3" name="content" id="content"></textarea>
                    <div class="weui-textarea-counter"><span>0</span>/200</div>
                </div>
            </div>
        </div>
        <div class="weui-btn-area">
          <a class="weui-btn weui-btn_primary" id="showToast" >确认修改</a>
        </div>
        <div id="toast" style="opacity: 0; display: none;">
        <div class="weui-mask_transparent"></div>
        <div class="weui-toast">
            <i class="weui-icon-success-no-circle weui-icon_toast"></i>
            <p class="weui-toast__content" >修改成功</p>
        </div>
        </div>
        </div>
        </div>
    </form>
    </body>
    <script src="<?php echo base_url('application/views/js/zepto.min.js'); ?>"></script>
    <script type="javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
    <script type="text/javascript">
     $(function(){
        var $toast=$("#toast");
        $('#showToast').on('click',function(){
        if($toast.css('display')!='none') return;
        $toast.fadeIn(100);
        setTimeout(function(){
        window.location.href="<?php echo site_url("Article/list/list.php")?>";
       },2000);
       });
    });
    </script>
    </html>
