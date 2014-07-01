<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Login Template</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="/static/admin/css/pure-nr-min.css">
<link rel="stylesheet" href="/static/admin/css/main.css">
<link rel="stylesheet" href="/static/admin/css/login.css">
<link rel="stylesheet" href="/static/admin/js/icheck/skins/minimal/blue.css">
</head>
<body>
<!-- BEGIN LOGO -->
<div class="pure-g">
	<div class="pure-u-1 logo"></div>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="pure-g content">
	<form class="pure-form pure-u-1" action="" method="post">
        <h4>请登录您的账号</h4>
        <fieldset class="pure-group">
            <input name="username" type="text" class="pure-input-1" placeholder="用户名" required autofocus>
            <input name="password" type="password" class="pure-input-1" placeholder="密　码" required>
        </fieldset>
		<label for="remeberMe" class="pure-checkbox">
            <input id="remeberMe" name="remeberMe" type="checkbox" value="1"> 30天内免登陆
        </label>
        <button class="pure-button pure-u-1 pure-button-primary" type="submit">登　录</button>
	</form>
</div>
<!-- END LOGIN -->
<!--BEGIN FOOT-->
<div class="pure-g copyright">
</div>
<!--END FOOT-->
<script src="/static/admin/js/jquery.min.js"></script>
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
</body>
</html>