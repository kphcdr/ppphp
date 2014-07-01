<!DOCTYPE html>
<html lang="cn">
<head>
<meta charset="utf-8">
<title>Form Template</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="/static/admin/css/pure-nr-min.css">
<link rel="stylesheet" href="/static/admin/css/fontAwesome/font-awesome.css">
<link rel="stylesheet" href="/static/admin/css/main.css">
<link rel="stylesheet" href="/static/admin/css/admin.css">   
<link rel="stylesheet" href="/static/admin/js/icheck/skins/minimal/blue.css">   
</head>
<body>
<!--BEGIN HEADER-->
{include file="admin/lib/header.tpl"}
<!--END HEADER-->
<div class="pure-g content">
<!--BEGIN left-->
{include file="admin/lib/left.tpl"}
<!--END left-->
    <div class="pure-u-1">
        <div class="main">
            <div class="panel panel-default">
                <div class="panel-title">
                    表单示例
                </div>
                <div class="panel-body">
                    <form class="pure-form pure-form-aligned" action="" method="post">
                        <fieldset>
                            <div class="pure-control-group">
                                <label for="name">标　题：</label>
                                <input id="name" class="pure-input-1-3" type="text" />
                            </div>
                            <div class="pure-control-group">
                                <label for="description">关键词：</label>
                                <input id="description" class="pure-input-1-3" type="text" />
                            </div>
                            <div class="pure-control-group">
                                <label for="category">分　类：</label>
                                <select name="category" id="category">
                                    <option value="分类1">分类一</option>
                                    <option value="分类2">分类二</option>
                                    <option value="分类3">分类三</option>
                                </select>
                            </div>
                            <div class="pure-control-cr-group">
                                <label class="label-head">推荐至：</label>
                                <label for="index-page" class="label-cr">
                                    <input id="index-page" type="checkbox" value="" checked="checked"/>
                                    首页
                                </label>
                                <label for="channel-page" class="label-cr">
                                    <input id="channel-page" type="checkbox" value="" />
                                    频道页
                                </label>
                                <label for="category-page" class="label-cr">
                                    <input id="category-page" type="checkbox" value="" />
                                    分类页
                                </label>
                            </div>
                            <div class="pure-control-cr-group">
                                <label class="label-head">状　态：</label>
                                <label for="index-radio" class="label-cr">
                                    <input id="index-radio" name="status" type="radio" value="" />
                                    首页
                                </label>
                                <label for="channel-radio" class="label-cr">
                                    <input id="channel-radio" name="status" type="radio" value="" checked />
                                    频道页
                                </label>
                                <label for="category-radio" class="label-cr">
                                    <input id="category-radio" name="status" type="radio" value="" />
                                    分类页
                                </label>
                            </div>
                            <div class="pure-control-group">
                                <label for="content">内　容：</label>
                                <textarea name="content" id="content" class="pure-u-3-4" rows="10"></textarea>
                            </div>
                            <div class="pure-controls">
                                <input class="pure-button pure-button-primary" type="submit" name="submit" value="提交" />
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BEGIN FOOT-->
{include file="admin/lib/copyright.tpl"}
<script src="/static/admin/js/icheck/icheck.min.js"></script>
<script>
$(function(){
    $('input').iCheck({
        checkboxClass : 'icheckbox_minimal-blue',
        radioClass : 'iradio_minimal-blue',
        increaseArea : '20%'
    });
});
</script>
<!--END FOOT-->
</body>
</html>