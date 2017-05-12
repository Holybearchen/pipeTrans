//联系人列表的显示与隐藏
$(function(){
    $(".level1>a").click(function(){
        $(this).next().slideToggle(10,function(){
        });
    });
});  
//显示当前联系人及聊天记录  
$(".level1").on("click","li",function(){
    $(".tosend h3").text($(this).text());
    $.ajax({
        type:"post",
        url:"__APP__/Communication/Index/getDialog",
        data:{"userName":$(this).text()},
        success:function(msg){
            var myjson="";
            var dat=eval('myjson=' + msg + ';');
            $(".showcontent").empty();
            $.each(dat,function(neirongIndex,val){
                var html="<div class='neirong'><span>"+val['sender'];
                html+=":</span><br/><p>"+val['content'];
                html+="</p></div>";
                $('.showcontent').append(html);
            });
        }
    });
});
//关闭当前页面，跳转到上级页面
function window_close(){
    if(confirm("您确定关闭此次聊天吗？")){
        if (navigator.userAgent.indexOf("Firefox") != -1 || navigator.userAgent.indexOf("Chrome") !=-1) {
            window.location.href="http://www.baidu.com";
            window.close();
        } else {
            window.opener = null;
            window.open("", "_self");
            window.close();
        }    
    }       
}


    
funtion face_xz(v){
    var facebook='[f:'+v+']';
    var yy=$('#content').val();
    var demo=yy+facebook;
    $('#content').val(demo);
    $('#face1').hide();
}

$(document).ready(funtion(){
    $('.submit').click(funtion(){
        var name=$('.content').val();
        if (name=="") {
            alert("内容不能为空");
        } 
        else
        {
            $.post("{:U(GROUP_NAME.'/Index/ajax')}",{content:name},funtion(msg){
                var dat=eval("("+msg+")");
                $(".show").empty();
                $.each(dat,function(neirongIndex,datt){
                    var html="<div class="neirong"><span>"+datt['sender'];
                    html+=":</span><br/>"+face_2(datt['content']);
                    html+="</div>";
                    $('.show').append(html);
                });
                $("textarea").val('');
            });
        }
    });

    /*工具栏*/
    $(document).on('click','#face',function(){
        $('#face1').show();
        $(this).attr("id","gb");
    });
    $(document).on('click','#gb',function(){
        $(this).attr("id","face");
    });
    $(function(){
        val=$("#face1").html();
        val=val.replace(/[f:(100|d{1,2})]/g,"<img onclick="face_xz($1)" src='/Public/face/$1.gif'>");
        $("#face1").html(val);
    });
});

function xx(){
    //返回处理最新十条消息
    $.get("{:U(GROUP_NAME.'/Index/fresh')}",'',function(mess){
        var dat=eval("("+mess+")");
        $(".show").empty();
        $.each(dat,function(neirongIndex,datt){
            var html="<div class='neirong'><span>"+datt['sender'];
            html+=":</span><br/>"+face_2(datt['content']);
            html+="</div>";
            $('.show').append(html);
        });
    });
    //返回处理在线用户
    $.get("{:U(GROUP_NAME.'/Index/freshUser')}",'',function(mes){
        var dat=eval("("+mes+")");
        $(".one").empty();
        $.each(dat,function(oneIndex,onlin){
            var line="<a href='' title='点击进行私聊'><span class='one'>"+onlin['nickname']+"<br/></span></a>";
            $('.online').append(line);
        });
    });
}
//自动刷新
setInterval("xx()",1000);
//处理表情
function face_2(val){
    val=val.replace(/[f:(100|d{1,2})]/g,"<img src='/Public/face/$1.gif'>");
    return val;
}