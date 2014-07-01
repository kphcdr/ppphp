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
            <div class="panel panel-default" >
                <div class="panel-title">
                    面板标题
                </div>
				<div class="panel-body">
<table class="pure-table" width="100%" >
    <thead>
        <tr>
            <th width="5%">#</th>
            <th width="40%">Make</th>
            <th width="40%">Model</th>
            <th width="15%">Year</th>
        </tr>
    </thead>
    <tbody>
        <tr class="pure-table-odd">
            <td>1</td>
            <td>Honda</td>
            <td>Accord</td>
            <td>2009</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Toyota</td>
            <td>Camry</td>
            <td>2012</td>
        </tr>
    </tbody>
</table>

				<ul class="pure-paginator pure-menu">
					<li><a class="" href="#">第一页</a></li>
					<li><a class="pure-button-active" href="#">1</a></li>
					<li><a class="" href="#">2</a></li>
					<li><a class="" href="#">3</a></li>
					<li><a class="" href="#">4</a></li>
					<li><a class="" href="#">5</a></li>
					<li><a class="" href="#">最后一页</a></li>
				</ul>

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