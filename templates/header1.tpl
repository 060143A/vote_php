<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>北京科技大学第十四届我爱我师评�?-- iBeiKe</title>
<link rel="stylesheet"
	href="static/style/style.css" type="text/css">

<style type="text/css" mce_bogus="1">        
	#sendComment
        { 
            border:#eeeeee 1px solid;
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
.scrollDiv{height:25px;/* ��ҪԪ�� */line-height:25px;border:#ccc 1px solid;overflow:hidden;/* ��ҪԪ�� */}
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
		setInterval('AutoScroll("#s1")',3000);
	});
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
            //清空上次评论内容
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
                alert("祝福内容太短!");
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
</head>

<body>
<div id="page">
<div id="header"><a class="logo"
	href="index.php"><img
	src="static/images/logo.jpg" alt="" title=""
	border="0" /></a>
<div id="menu">
<ul>
	<li><a href="index.php">主页</a></li>
	<li><a href="index.php?p=poll">公共�?/a></li>
	<li><a href="index.php?p=gm">金质奖章</a></li>
	<li><a href="index.php?collage=tuhuan">土环</a></li>
	<li><a href="index.php?collage=yejin">冶金</a></li>
	<li><a href="index.php?collage=cailiao">材料</a></li>
	<li><a href="index.php?collage=jixie">机械</a></li>
	<li><a href="index.php?collage=jitong">计�?/a></li>
	<li><a href="index.php?collage=zidonghua">自动�?/a></li>
	<li><a href="index.php?collage=shuli">数理</a></li>
	<li><a href="index.php?collage=huasheng">化生</a></li>
	<li><a href="index.php?collage=jingguan">经管</a></li>
	<li><a href="index.php?collage=wenfa">文法</a></li>
	<li><a href="index.php?collage=waiyu">外语</a></li>
	<li><a href="index.php?collage=tiyu">体育�?/a></li>
	<li><a href="index.php?collage=wuzhuang">武装�?/a></li>

</ul>
</div>
</div>
<div id='sendComment'>
              <div id="title"><h4>祝福</h4><span onclick="hide()">关闭</span></div> 
               <input id="problemID" type="hidden" value=""/>
              <div style="text-align:left" mce_style="text-align:left">&nbsp;&nbsp;祝福内容�?/div>
              <div class="content">
                 <textarea id="content" cols="35" rows="1" ></textarea>
              </div> 
              <div id="btnSubmit">
                    <input type="button" value="提交" onclick="btn_sendComment()" />
              </div>
    </div>