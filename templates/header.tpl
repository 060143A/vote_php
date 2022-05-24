<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>第一届本科生“十佳导师”评选活动</title>
<link rel="stylesheet" href="static/style/style.css" type="text/css">

<style type="text/css" mce_bogus="1">        
	#sendComment
        { 
            border:rgb(248, 161, 152)  1px solid;
            display:none;       
            width:480px;
            height:120px; 
            background:#F6F6F6;     
            position:fixed;       
            _position:absolute; /* hack for internet explorer 6*/
            z-index:2;     
        } 
        #title
        {
            height:23px;
            padding:7px 10px 0;
            color:#000000;
            background-image:url(../imgs/box_bg_t1.gif);
	        background-repeat:repeat-x;
	        margin:0px;
        }
        #title h4
        {
            float:left;
            padding:0;
            margin:0;
            font-size:14px;
            line-height:16px;
        }
        #title span
        {
            float:right;
        }
        #userID
        {
            height:30px;
            text-align:center;
            display:none;
        }
         .content
         { 
              padding-left: 3px; 
              padding-top: 5px;
              text-align:center;
               
         } 
       #btnSubmit
        {
            width:360px;
            height:30px;
            text-align:right;
            padding-top:5px;
        }
    </style>
<style type="text/css">
*{margin:0;padding:0;}
ul,li{list-style-type:none;}
body{font:12px/180% Arial, Helvetica, sans-serif;}
a{color:#333;text-decoration:none;}
a:hover{color:#3366cc;text-decoration:underline;}
.demopage{width:960px;margin:0 auto;}
.demopage h2{font-size:14px;margin:20px 0;}
/* scrollDiv */
.scrollDiv{height:25px;/* 必要元素 */line-height:25px;border:#ff7600 1px solid;overflow:hidden;/* 必要元素 */}
.scrollDiv li{height:25px;padding-left:10px;}
#s2,#s3{height:100px;}
</style>

<script src="static/js/jquery.js"></script>
<script src="static/js/jquery.easydrag.handler.beta2.js"></script>

<script type="text/javascript" language=javascript>
	function AutoScroll(obj){
		$(obj).find("ul:first").animate({
			marginTop:"-25px"
		},500,function(){
			$(this).css({marginTop:"0px"}).find("li:first").appendTo(this);
		});
	}
	$(document).ready(function(){
		setInterval('AutoScroll(".scrollDiv")',3000);
	});
	<{if $maxTimes == true}> 
	alert('超过最大投票数');
	<{/if}>
	<{if $samePoll == true}> 
	alert('投票成功');
	<{/if}>
</script>
<script type="text/javascript" language=javascript>
        $(document).ready(function() {
            $("#sendComment").easydrag();
            $("#sendComment").setHandler("title");
            
            $(".send").click(function(e) {
               
            var pid = $(this).attr("pid");
            $("#problemID").attr("value", pid);

            showWin();
            
            })
        });

        function showWin() {
            $("#content").val("");
            
            var winNode = $("#sendComment");

            var myWidth = 0, myHeight = 0;
            
            if (typeof (window.innerWidth) == "number") {
                myWidth = window.innerWidth;
                myHeight = window.innerHeight;
            } else {
                if (document.documentElement && (document.documentElement.clientWidth || document.documentElement.clientHeight)) {
                    myWidth = document.documentElement.clientWidth;
                    myHeight = document.documentElement.clientHeight;
                } else {
                    if (document.body && (document.body.clientWidth || document.body.clientHeight)) {
                        myWidth = document.body.clientWidth;
                        myHeight = document.body.clientHeight;
                    }
                }
            }

            var left = (myWidth - 480) / 2 + "px";
            var top = (myHeight - 260) / 2 + document.documentElement.scrollTop + "px";

            $("#sendComment").css("positon", "absolute");
            $("#sendComment").css("left", left);
            $("#sendComment").css("top", top);
            
            winNode.show("slow");
        }

        function hide() {
            var winNode = $("#sendComment");
            winNode.fadeOut("slow");
        }

        function btn_sendComment() 
        {
            var proID = $("#problemID").val();
            var content = $("#content").val();
            if (len(content) < 10) 
            {
                alert("长度太短!");
                return;
            }
	        $.get("comment.php?proID="+escape(proID)+"&content="+escape(content)+"&time="+new Date().toString(),
	                null,
	                function(data){
		              alert(data);
		            }
		    );
		}

        function len(str) 
        {
            var byteLen=0,len=str.length; 
            if(str){ 
                for(var i=0; i<len; i++){ 
                    if(str.charCodeAt(i)>255)
                    { 
                        byteLen += 2; 
                    } 
                    else
                    { 
                        byteLen++; 
                    } 
                } 
                return byteLen; 
            } 
            else
            { 
                return 0; 
            } 
        } 
    </script>
<script>
$.ajax({
url:'wishwell.xml',
type:'GET',
dataType:'xml',
error:function(xml){
	console.log('cannot read wishwell.xml');
},
success:function(xml){
	$(xml).find("rwish").each(function(i){
		var id=$(this).children("teacherid").text();
		var value=$(this).children("wish").text();
		$("#teach_"+id).append("<li>"+unescape(value) +"</li>");
		});
	}
});

</script>
<script src="http://www.ibeike.com/topnav.js"></script>
</head>

<body>
<div id="page">
<div id="header"><a class="logo"
	href="index.php"><img
	src="static/images/alpha-banner.jpg" alt="" style="width: 100%;" /></a>
<div id="menu">
<ul>
	<li><a href="index.php">主页</a></li>
	<!-- <li><a href="wish.php">祝福</a></li> -->
	<li><a href="index.php?p=result">投票结果</a></li>
	<{if $isLogin==true}>
	<li><a href="index.php?p=logout">退出</a></li>
	<{/if}>
</ul>
</div>
</div>
<div id='sendComment'>
              <div id="title"><h4>祝福</h4><span onclick="hide()">关闭</span></div> 
               <input id="problemID" type="hidden" value=""/>
              <div style="text-align:left" mce_style="text-align:left">&nbsp;&nbsp;祝福内容</div>
              <div class="content">
                 <textarea id="content" cols="35" rows="1" style="max-height:30px;max-width:400px;" ></textarea>
              </div> 
              <div id="btnSubmit">
                    <input type="button" value="发送祝福" onclick="btn_sendComment()" />
              </div>
    </div>
