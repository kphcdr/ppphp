<!DOCTYPE html>
<html lang="cn">
<head>
<meta charset="utf-8">
<title>Js Template</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="/static/admin/css/pure-nr-min.css">
<link rel="stylesheet" href="/static/admin/css/fontAwesome/font-awesome.css">
<link rel="stylesheet" href="/static/admin/css/main.css">
<link rel="stylesheet" href="/static/admin/css/admin.css">
<link rel="stylesheet" href="/static/admin/js/artDialog/ui-dialog.css">
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
                    Dialog
                </div>
                <div class="panel-body">
                    <button class="pure-button pure-button-primary" id="showDialog">显示</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BEGIN FOOT-->
{include file="admin/lib/copyright.tpl"}
<!--END FOOT-->
<script src="/static/admin/js/artDialog/popup.js"></script>
<script src="/static/admin/js/artDialog/dialog.js"></script>
<script>
$(function(){
    $("#showDialog").on('click', function(){
        var d = artDialog({
            title: '消息',
//            content: '风吹起的青色衣衫，夕阳里的温暖容颜，你比以前更加美丽，像盛开的花<br>——许巍《难忘的一天》',
            fixed: true,
            okValue: '确 定',
            ok: function(){
                alert('你点击了');
            },
            cancelValue: '取 消',
            cancel: function(){
            }
        });
        d.content('风吹起的青色衣衫，夕阳里的温暖容颜，你比以前更加美丽，像盛开的花<br>——许巍《难忘的一天》');
        d.showModal();
    });
});
</script>
</body>
</html>