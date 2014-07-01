<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Form Template</title>
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
        </div>
    </div>
</div>
<!--BEGIN FOOT-->
{include file="admin/lib/copyright.tpl"}
<!--END FOOT-->
</body>
</html>