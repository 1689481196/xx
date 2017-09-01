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
    <form action="<?php echo site_url('Article/article_add')?>" method="post">
        <div class="weui-toptips weui-toptips_warn js_tooltips" style="display:none;">数据不能为空</div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">新闻标题:</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入新闻标题"  name="title" value="" id="title">
                </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">发布时间:</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="date"  name="time" value="" id="time">
                </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">发布作者:</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入发布作者"  name="author" value="" id="author">
                </div>
        </div>
        <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">新闻内容:</label></div>
        </div>
        <div class="weui-cells weui-cells_form" style="margin-top: -5px;">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea" placeholder="请输入新闻发布内容" rows="3" name="content" id="content"></textarea>
                    <div class="weui-textarea-counter"><span>0</span>/200</div>
                </div>
            </div>
        </div>
        <label for="weuiAgree" class="weui-agree">
            <input id="weuiAgree" type="checkbox" class="weui-agree__checkbox">
            <span class="weui-agree__text">
                阅读并同意<a href="javascript:void(0);">《相关条款》</a>
            </span>
        </label>
        <div class="weui-btn-area">
        <button class="weui-btn weui-btn_primary" type="submit"  id="showTooltips">确认发布</button>
        </div>
    </form>
    </body>
   <script src="<?php echo base_url('application/views/js/zepto.min.js'); ?>"></script>
    <script type="javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
    <script type="text/javascript">
    $(function() {
      var $tooltips = $('.js_tooltips');
      $('#showTooltips').on('click', function() {
        var title = $("#title").val();
        var time=$("#time").val();
        var author=$("#author").val();
        var content=$("#content").val();
        if($tooltips.css('display') != 'none') {
          return;
        }
        // toptips的fixed, 如果有`animation`, `position: fixed`不生效
        $('.page.cell').removeClass('slideIn');
        setTimeout(function() {
          $tooltips.css('display', 'none');
        }, 2000);
        if(!title) {
          $tooltips.css('display', 'block');
          $tooltips.html("新闻标题不能为空");
          return false;
        }
        if(!time) {
          $tooltips.css('display', 'block');
          $tooltips.html("发布时间不能为空");
          return false;
        }
        if(!author){
          $tooltips.css('display','block');
          $tooltips.html("发布作者不能为空");
          return false;
        }
        if(!content){
          $tooltips.css('display','block');
          $tooltips.html("发布内容不能为空");
          return false;
        }
      });

    });
  </script>
    </html>
