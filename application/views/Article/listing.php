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
    <div style="background-color: #cccccc">
    <a class="weui-btn weui-btn_primary" type="submit"  id="showTooltips" style="width: 100px;margin: 0 1px;" href="<?php echo site_url("Article/add")?>">添加新闻</a>
    </div>
    <div id="content">
    <?php foreach ($goodstypes as $v):?>
    <div class="weui-cell weui-cell_switch" >
        <a  class="weui-cell__bd" style="color:green" href="<?php  echo site_url('Article/list_detail/'.$v['id'])?>">新闻标题:<?php echo mb_substr($v['title'],0,3,'utf-8')?></a>
        <a  class="weui-cell__bd" style="color:#000000;margin-left:10x;" ><?php echo $v['time']?></a>
        <a href="<?php  echo site_url('Article/list_detail/'.$v['id'])?>" class="weui-btn weui-btn_mini weui-btn_primary" style="width: 90px;">查看详情</a>
    </div>
    <?php endforeach?>
    </div>
    <!-- <?php if($pageinfo){ echo $pageinfo; } ?> -->
    </body>
    <script src="<?php echo base_url('application/views/js/zepto.min.js'); ?>"></script>
    <script type="javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
    <script>
    $(document).ready(function(){
        $(window).scroll(function(){
            var scrollTop = $(this).scrollTop();               //滚动条距离顶部的高度
    　　    var scrollHeight = $(document).height();                   //当前页面的总高度
    　　    var windowHeight = $(this).height();                   //当前可视的页面高度
    　      if(scrollTop + windowHeight >= scrollHeight){        //距离顶部+当前高度 >=文档总高度 即代表滑动到底部
                var page = 1;
                 $.ajax({
                    "data":{"page":page},
                    "url":"<?php echo site_url("Article/refresh_list");?>",
                    "type":"get",
                    success:function(data){
                        var str = "";
                        for(var i in data){
                            str += '<div class="weui-cell weui-cell_switch">';
                            str += '<a class="weui-cell__bd" style="color:green;margin-left:10px;" href="<?php  echo site_url('Article/list_detail/'.$v['id'])?>">新闻标题:' + data[i].title.substring(0,4)+ '</a>';
                            str += '<a class="weui-cell__bd">'+data[i].time+'</a>';
                            str += '<a class="weui-btn weui-btn_mini weui-btn_primary"   style="width: 90px;" href="<?php  echo site_url('Article/list_detail/'.$v['id'])?>">查看详情</a>';
                            str +='</div>';

                        }
                        //在被选元素的后面添加指定的元素
                        $("#content").append(str);
                        page++;
                    }
                });
            }


        });
    });
    </script>
    </html>
