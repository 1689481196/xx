<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
        <title>新闻发布系统</title>
        <link rel="stylesheet" href="<?php echo base_url('application/views/css/weui.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('application/views/css/example.css'); ?>">
        <style type="text/css">
            #showTooltips{
            width:48%;
            float: left;
            margin-left: 5px;
            }
        </style>
    </head>
    <body>
    <form action="<?php echo site_url('Article/edit_update')?>" method="post">
        <?php foreach($article_edit as $v)?>
        <input type="hidden" name="id" value="<?php echo $article_edit[0]['id']?>">
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">新闻标题:</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text"  name="title" value="<?php echo $v['title']?>" id="title">
                </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">发布时间:</label></div>
                <div class="weui-cell__bd">
                     <input class="weui-input" type="date" value="<?php echo $v['time']?>"  name="time" value="" id="time">
                </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">发布作者:</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" value="<?php echo $v['author']?>"  name="author" value="" id="author">
                </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">新闻内容:</label></div>
        </div>
        <div class="weui-cells weui-cells_form" style="margin-top: -5px;">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea"  rows="3" name="content" id="te"  onfocus="ss=setInterval(sp,600)" onblur="clearInterval(ss)"><?php echo $v['content']?></textarea>
                    <div class="weui-textarea-counter">你已经输入<span id="span" >0</span>字/200</div>
                </div>
            </div>
        </div>
        <div class="weui-btn-area">
        <button class="weui-btn weui-btn_primary" type="submit"  id="showTooltips" ">确认修改</button>
        </div>
        <div class="weui-btn-area">
        <a class="weui-btn weui-btn_primary" type="reset"  id="" href="<?php echo site_url("Article/listing")?>">返回</a>
        </div>
        <div id="toast" style="opacity: 0; display: none;">
            <div class="weui-mask_transparent"></div>
            <div class="weui-toast">
                <i class="weui-icon-success-no-circle weui-icon_toast"></i>
                <p class="weui-toast__content">已完成</p>
            </div>
        </div>
    </form>
    </body>
    <script src="<?php echo base_url('application/views/js/zepto.min.js'); ?>"></script>
    <script type="javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
    <script type="text/javascript">
    function sp(){
        var tex = $('#te').val();
        var num =tex.length;
        $('#span').text(num);
        if(num>200){
            var num = $("#te").val().substr(0,200,'utf-8');
            $("#te").val(num);
        }
    }
    setInterval(sp,100);
    $('#showTooltips').on('click', function() {
        var toast = $("#toast");
        if (toast.css('display') != 'none') return;
        toast.fadeIn(1);
        setTimeout(function(){
            toast.fadeOut(200);
        },5000);
    });
    </script>
    </html>
