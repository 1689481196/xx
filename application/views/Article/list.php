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
    <div class="content">
    <div style="background-color: #cccccc">
    <a class="weui-btn weui-btn_primary" type="submit"  id="showTooltips" style="width: 100px;margin: 0 1px;" href="<?php echo site_url("Article/listing")?>">返回列表</a>
    </div>
        <?php foreach ($news_list as $v):?>
            <div class="weui-form-preview">
                <div class="weui-form-preview__bd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">新闻标题</label>
                        <span class="weui-form-preview__value"><?php echo $v['title']?></span>
                    </div>
                </div>
            </div>
            <div class="weui-form-preview">
                <div class="weui-form-preview__bd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">发布时间</label>
                        <span class="weui-form-preview__value"><?php echo $v['time']?></span>
                    </div>
                </div>
            </div>
            <div class="weui-form-preview">
                <div class="weui-form-preview__bd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">发布作者</label>
                        <span class="weui-form-preview__value"><?php echo $v['author']?></span>
                    </div>
                </div>
            </div>
            <div class="weui-form-preview">
                <div class="weui-form-preview__bd">
                    <div class="weui-form-preview__item">
                        <label class="weui-form-preview__label">新闻内容</label>
                    </div>
                </div>
            </div>
            <div class="weui-cells weui-cells_form" style="margin-top: -5px;">
            <div class="weui-cell">
                <div class="weui-cell__bd">
                    <textarea class="weui-textarea"  rows="3" name="content" readonly="readonly" id="te" style="color: #999999" onfocus="ss=setInterval(sp,600)" onblur="clearInterval(ss)"><?php echo $v['content']?></textarea>
                    <div class="weui-textarea-counter">你已经输入<span id="span" >0</span>字/200</div>
                </div>
            </div>
            <div class="weui-form-preview__ft">
                <div id="dialogs">
                    <div class="js_dialog" id="delete1-Dialog" style="display: none;">
                        <div class="weui-mask"></div>
                            <div class="weui-dialog">
                                <div class="weui-dialog__title">确定删除吗？</div>
                                <div class="weui-dialog__ft">
                                    <a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_primary" id="ture" onclick="del(<?php echo $v['id']?>,$(this))">确定</a>
                                    <a href="javascript:;" class="weui-dialog__btn weui-dialog__btn_default" id="false"onclick="delss($(this))">取消</a>
                                </div>
                            </div>
                    </div>
                </div>
                    <a type="submit" class="weui-form-preview__btn weui-form-preview__btn_primary" href="<?php echo site_url('Article/edit/'.$v['id'])?>">编辑</a>
                    <a type="submit" class="weui-form-preview__btn weui-form-preview__btn_primary" onclick="dels($(this))">删除</a>
            </div>
            </div>
        <?php endforeach ?>
    </div>
    </body>
    <script src="<?php echo base_url('application/views/js/zepto.min.js'); ?>"></script>
    <script type="javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
    <script type="text/javascript" src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script src="https://res.wx.qq.com/open/libs/weuijs/1.0.0/weui.min.js"></script>
    <script type="text/javascript">
    function dels(thisobj){
        thisobj.parent().find('#dialogs').find('#delete1-Dialog').fadeIn(25);
     };
    function delss(thisobject){
        thisobject.parents('.js_dialog').fadeOut(1);
     };
    function del(id,thisobj){
        var id=id;
        var url='<?php echo site_url('Article/del')?>';
        $.ajax({
            type:"POST",
            url:url,
            data:{'id':id},
            dataType:"json",
            async:false,
            success:function(data){
                if (data.data==1){
                    thisobj.parents('.js_dialog').fadeOut(1);
                    window.location.href="<?php echo site_url('Article/listing')?>";
                }else if (data==0){
                    alert('删除失败');
                    return false;
                }
            }
        });
    };
    function sp(){
        var tex = $('#te').val();
        var num = tex.length;
        $('#span').text(num);
        if(num>200){
            var num = $("#te").val().substr(0,200,'utf-8');
            $("#te").val(num);
        }
    }
    setInterval(sp,100);
    </script>

</html>
