$(".btn-login").click(function(){
    layer.load(1);
    var name = $("#name").val()
    var password = $("#password").val()

    if(password.length < 2 || name.length < 2) {
        layer.closeAll('loading');
        layer.msg('太短了', function(){});
        return false;
    }

    $.post('/login/login',{'name':name,'password':password},function(data){
        if(data.status == 0) {
            layer.msg(data.message);

            location.href = "/";
        } else {
            layer.msg(data.message,{time: 1500}, function(){});
        }
        layer.closeAll('loading');
    })
    return false;
});