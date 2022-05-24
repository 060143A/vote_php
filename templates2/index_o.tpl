<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"> 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<title>"青年榜样,青春励志"北京科技大学励志人物寻访活动网络投票 -- iBeiKe</title>
<script language="javascript">
window._alert=window.alert; 
window.alert=function(s) { 
_alert(s.replace(/&#(\d{5});/g,function(r,r1) {return String.fromCharCode(r1);})); 
} 
</script>
<style type="text/css">
body{
font:12px "Lucida Grande", Arial, Verdana, sans-serif;
color:#333;text-align:center;
margin:0;
padding:0;
background:#A20F00;
}

#page{
margin:0 auto;
width:960px; 
background:#A20F00;
	   padding-top:10px;
}
#header{
background:white url(static/images/banner.jpg);

height:150px; 
       text-align:left;
}

#header h1 a{
display: block;
height: 120px;
width: 236px;
       text-indent: -2000em;
       text-decoration: none;
       z-index: 1000; 
       /* need for FX and IE */
background: url(static/images/banner.jpg) 0 0 no-repeat;
}
#header span{
	float: right;

	margin: 90px 15px 0;
	color: white;
	font-weight : bold;
	}

#header a{
	color: white;
}

.md .text_box{clear:both;_height:0%;border:solid 1px #e5e5e5; color:#ff7600; background:url(static/images/box.jpg) no-repeat;}
.md .text_box h1{font-size:16px;margin:2px 0 4px;font-weight:bold;line-height:24px}
.md .text_box h1 a{}
.md .text_box h2{font-size:14px;margin:2px 0 4px;font-weight:bold;line-height:22px}
.md .text_box h2 a{}
.md .text_box h3{font-size:12px;margin:2px 2px 1px;font-weight:bold;line-height:20px}
.md .text_box h3 a{}
.md .text_box h4{font-size:12px;margin:2px 0 2px;font-weight:bold;line-height:18px}
.md .text_box h4 a{}
.md .text_box img{margin:5px; border:3px solid #ccc max-width:800px; max-height:200px;}
.md .text_box .l{margin:0 5px 0 2px}
.md .text_box .r{margin:0 2px 0 5px}
.md .text_box p{margin: 0px 2px 0px 2px;margin-bottom:5px}
.md .text_box .view_detail{padding-left:12px;text-decoration:underline}
.md .text_box a.underline{text-decoration:underline}
.md .text_box:after{content:".";display:block;clear:both;visibility:hidden;font-size:0px;line-height:0px;height:0}
.dot_line,.solid_line{background:url(static/images/dot_h_1.gif) repeat-x left top;margin:5px auto 6px;height:1px;font-size:0}
body .l, body .left{float:left;clear:none}
body .r, body .right{float:right;clear:none}
.md{border:solid 1px #e5e5e5;}
.md{clear:both;background:#ffffcc}

.clear
{clear: both}
p.comments
{
	font-size:9pt;
}
.footer
{
	font-size:9pt;
}

td.ttl2_1 { background:url(static/images/att.jpg) no-repeat center; 
	color:#A40000; font-size: 16px;
}
p.att { margin:0px 0px 0px 170px; text-align:left }
</style>

</head>
<body>
</body>
<div id="page">
<div id="header"></div>
<div id="mainbody">
		<div class="md toupiao">

  <table border="0" cellpadding="0" cellspacing="0" class="main" width="100%"><tbody>
     <tr>
       <td height="87" width="30"></td>
      <td class="ttl2_1">
		<p class="att">投票结果实时显示，刷新更新数据。投票时间截止到2022年5月31日24：00。
		</p>
     </td>
      <td width="16"></td>
    </tr>


    <tr>
      <td></td>
      <td valign="top">
<hr />	 
        <table border="0" cellpadding="10" cellspacing="0"><tbody>

<form action="vote.php" method="post">

<{section name=votepr loop=$choice}>
<{if $smarty.section.votepr.index == 3}>
</tr>
          <tr><td colspan="9" height="14"></td></tr>


          <tr>
<{elseif $smarty.section.votepr.index == 6}>
</tr>
          <tr><td colspan="9" height="14"></td></tr>


          <tr>
<{elseif $smarty.section.votepr.index == 9}>
</tr>
          <tr><td colspan="9" height="14"></td></tr>


          <tr>
<{/if}>

<td width="232">
<div class="text_box" style="height:552px;overflow-y:auto;">
<a href="<{$choice[votepr]->url}>" target="_blank"><img src="<{$choice[votepr]->imglink}>" style="width:170px;height:183px;" /></a>
<h3><span class="r">得票 <{$choice[votepr]->votes}></span><span class="l"><{$choice[votepr]->name}></span></h3>
<div class="clear dot_line"></div>
<br/>
<p class="comments" align="left" style="height:250px"><{$choice[votepr]->comment}></p>
<div class="clear dot_line"></div>
<center><input type="radio" name="radio" value = "<{$smarty.section.votepr.index + 1}>">选择</input></center>
</div>
</td>

<td width="14"></td>

<{/section}>

<td width="14"></td>

    <td width="14"></td>

          </tr>
          <tr><td colspan="9" height="14"></td></tr>
        </tbody>
        </table>
<center>
<input type="submit" name="submit" value = "提交"></input>
<br />
<br />
<br />
</center>
</form>
<hr />
<center>
<p class="footer">
iBeiKe Teams By <a href="mailto:richardguan6655@gmail.com" style="color:#000">Richard Guan</a>
</p>
</center>
</div>
</div>
</html>
