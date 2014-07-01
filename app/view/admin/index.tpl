<!DOCTYPE html>
<html lang="cn">
<head>
<meta charset="utf-8">
<title>Index Template</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="/static/admin/css/pure-nr-min.css">
<link rel="stylesheet" href="/static/admin/css/fontAwesome/font-awesome.css">
<link rel="stylesheet" href="/static/admin/css/main.css">
<link rel="stylesheet" href="/static/admin/css/admin.css">      
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
                    面板标题
                </div>
                <div class="panel-body">
                    面板内容
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-title">
                    警告
                </div>
                <div class="panel-body">
                    <div class="alert alert-success">Well done! You successfully read <a href="#" class="alert-link">this important alert message</a>.</div>
                    <div class="alert alert-danger">Well done! You successfully read this important alert message.</div>
                    <div class="alert alert-warning">Well done! You successfully read this important alert message.</div>
                    <div class="alert alert-info">Well done! You successfully read this important alert message.</div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-title">
                    按钮
                </div>
                <div class="panel-body">
                    <div style="margin-bottom: 5px;"><button type="button" class="pure-button pure-u-1-4">确认</button></div>
                    <div style="margin-bottom: 5px;"><button type="button" class="pure-button pure-button-primary pure-u-1-4">确认</button></div>
                    <div style="margin-bottom: 5px;"><button type="button" class="pure-button pure-button-active pure-u-1-4">确认</button></div>
                    <div style="margin-bottom: 5px;"><button type="button" class="pure-button pure-button-disabled pure-u-1-4">确认</button></div>
                    <div style="margin-bottom: 5px;"><button type="button" class="pure-button pure-button-primary pure-u-1-4"><i class="icon-save"></i> 确认</button></div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-title">
                    标签
                </div>
                <div class="panel-body">
                    <span class="label label-default">default</span>
                    <span class="label label-primary">primary</span>
                    <span class="label label-success">成功</span>
                    <span class="label label-danger">危险操作</span>
                    <span class="label label-info">Info</span>
                    <span class="label label-warning">Warning</span>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-title">
                    面包屑导航
                </div>
                <div class="panel-body">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Library</a></li>
                        <li class="active">Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!--BEGIN FOOT-->
{include file="admin/lib/copyright.tpl"}
<!--END FOOT-->
</body>
</html>