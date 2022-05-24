<{include file="header.tpl"}>
<div id="content">
<{if $isEnd == true}>
<div id="head1" style="    font-size: 20px;    text-align: left;    padding: 20px;">投票已结束</div>
<{/if}> 


<{if $polls == true}>
<table border="0" cellpadding="0" cellspacing="0" class="main"
	width="100%">
	<tbody>
		<tr>
			<td height="87" width="30"></td>
			<td class="ttl2_1">
			<p class="att" style="font-size:14px">1、登陆才可投票,可最多选择10名老师，投票可分多次，已对某位老师投票后则无法取消。 <br />
			2、用户名为学号,不区分大小写(例如：41802153 or U202140320)。 <br />
			3、普通学生密码默认为身份证后6位(若有X，为大写)。<br/>
			4、留学生密码默认为护照后6位。<br/>
			<!-- 4、导师排序为拼音顺序。 <br /> -->
			5、选择老师后请注意点击提交按钮完成投票流程。<br>
			6、本次网络投票时间为2022年5月26日0时至2022年5月31日24时。(25日12时到26日0时为投票测试阶段，投票数据会在投票测试阶段结束后清零。)</p>
			</td>
			<td width="16"></td>
		</tr>
		<tr>
			<td></td>
			<td valign="top">
			<hr />
			<center><br />
			<br />
			<br />

			<form action="index.php?p=poll" method="post"><input type="hidden"  name="csrf_token"
				value="<{$csrf_token}>" /> 
	<{if $isLogin == false}> 
			<input type="hidden" value="1" name="login"/>
			<{if $loginFailed == true}>
				<p>登录失败</p>
			<{/if}>
			<table border="0" cellpadding="0">
				<tr>
					<th><label for="id_username">学号:</label></th>
					<td><input style="height: 25px; FONT-SIZE: 20px" name="username" maxlength="30" type="text" id="id_username" size="20" /></td></tr>
        				<tr></tr>
						<tr><th><label for="id_password">密码:</label></th><td><input input style="height:25px;FONT-SIZE:20px" id="id_password" maxlength="30" type="password" name="password" size="20" /></td></tr>
 <tr><th><label for="id_code">验证码(不区分大小写):</label></th><td><input input style="height:25px;FONT-SIZE:20px;width:46px" id="id_code" maxlength="30" type="text" name="code" size="20" /><div style="float: right"><img src='getcode.php' alt='' style="height:30px;top:50px"/></div></td></tr>
    				</table>
    				
    				<p><input type="submit" class="submit" style="width:100px;height:30px;font-size:14px" value="登陆" /></p>
    <{/if}>	
    <{if $isLogin == true}>
    <script>
    	
    </script>
    				<input type="hidden" value="1" name="isPoll"/>

    				<table border="0" cellpadding="10" cellspacing="0"><tbody>
						<{section name=loop loop=$choice}>
							<{assign var="num" value=$choice[loop]._id}>
							<{if ($smarty.section.loop.index mod 3 eq 0) and ($smarty.section.loop.index != 0)}>
    					    	</tr>
          						<tr><td colspan="9" height="14"></td></tr>
         						<tr>
							<{/if }>
							<{if $smarty.section.loop.index == 0}>
								<tr>
							<{/if}>
								<td class="md" style="width:232px">
									<div class="text_box" style="width:232px;height:500px;overflow:hidden; text-align:center;">
									<a href="http://wiki.ibeike.com/index.php/<{$choice[loop].name}>" target="_blank"><img src="<{$choice[loop].imglink}>" style="height:170px;max-width:100%" /></a>
										<h3><span class="r">得票：<{$choice[loop].vote}></span>
										<{if $isPolled[$choice[loop]._id] == 0}><span class="l"><input type="checkbox" name="checked[]" value="<{$choice[loop]._id}>" onclick="oncheck(this)" /></span><{else}>
										<input type="checkbox" checked='checked' disabled='disabled' /></span>
										<{/if}>  
										<span class="l"><{$choice[loop].name}></span>
										</h3>
										<div class="clear dot_line"></div>
										<p class="comments"><{$choice[loop].comment}></p>
<!--										<div class="scrollDiv">
<ul id="teach_<{$choice[loop]._id}>">
</ul>
</div>
-->
										<!--<a class="send" pid='<{$choice[loop]._id}>' href="####"><img alt="" src="static/images/sendwell.png" style="border:0px;"/></a>							-->
									</div>
            					</td>
            					<td width="25"></td>
						<{/section}>
    							<td width="14"></td>
          					</tr>
          						<tr><td colspan="9" height="14">
          						</td></tr>
        			</tbody></table>
				<script>
				var totalPolled = <{$totalPolled}>;
				var check_count = 0;
				var check_limit = 10-totalPolled;
				function oncheck(cb){
					if(cb.checked==true){
						if(check_count<check_limit){
							check_count += 1;
						}else{
							alert('每人限投10票');
							cb.checked = false;
							//cb.disable = true;
						}
					}else if(cb.checked==false){
						if(check_count>0){
							check_count -= 1;
						}else{
							alert('alpha');
						}
					}
				}
				</script>
        			<p><input type="submit" class="submit" style="width:100px;height:30px;font-size:14px" value="提交" /></p>
    <{/if}>
    			</form>
			</center>
		</table>

<{/if}>

<{if $showResult == true}>
<{if $fowardResult == true}>
<script>alert('投票成功！');location='index.php?p=result';</script>
<{/if}>
<table border="0" cellpadding="0" cellspacing="0" class="main"
	width="100%">
	<tbody>
		<tr>
			<td height="87" width="30"></td>
			<td class="ttl2_1">
			<p class="att" style="font-size:14px">1、登陆才可投票,可最多选择10名老师，投票可分多次，已对某位老师投票后则无法取消。 <br />
			2、用户名为学号,不区分大小写(ex.G20193100)。 <br />
			3、普通学生密码默认为身份证后6位(若有X，为大写)。<br/>
			4、留学生密码默认为护照后6位。<br/>
			5、本次网络投票时间为2022年5月26日0时至2022年5月31日24时。(25日12时到26日0时为投票测试阶段，投票数据会在投票测试阶段结束后清零。)</p>
			<!-- 4、导师排序为拼音顺序。 --></p>
			</td>
			<td width="16"></td>
		</tr>
		<tr>
			<td></td>
			<td valign="top">
			<hr />
			<center><br />
			<center><h1>总参与投票人数：<{$numStu}></h1></center>
			<br />
			<br />


    				<table border="0" cellpadding="10" cellspacing="0"><tbody>
						<{section name=loop loop=$choice}>
							<{if ($smarty.section.loop.index mod 3 eq 0) and ($smarty.section.loop.index != 0)}>
    					    	</tr>
          						<tr><td colspan="9" height="14"></td></tr>
         						<tr>
							<{/if }>
							<{if $smarty.section.loop.index == 0}>
								<tr>
							<{/if}>
								<td class = "md" style="width:232px">
									<div class="text_box" style="width:232px;height:500px;overflow:hidden;  text-align:center;">
									<a href="#" target="_blank"><img src="<{$choice[loop].imglink}>" style="height:170px;max-width:100%" /></a>
										<h3><span class="r">得票：<{$choice[loop].vote}></span><span class="l"><{$choice[loop].name}></span></h3>
										<div class="clear dot_line"></div>
										<p class="comments"><{$choice[loop].comment}></p>
<!--<div class="scrollDiv">
<ul id="teach_<{$choice[loop]._id}>">
</ul>
</div>-->

									</div>
            					</td>
            					<td width="25"></td>
						<{/section }>
    							<td width="14"></td>
          					</tr>
          						<tr><td colspan="9" height="14"></td></tr>
        			</tbody></table>
			</center>
		</table>


<{/if}>

<{if $showMajor == true}>
<div class="md toupiao">
  <table border="0" cellpadding="0" cellspacing="0" class="main" width="100%"><tbody>
     <tr>
       <td height="87" width="30"></td>
      <td class="tips">
                <p class="att">数据正在统计中，敬请期待！<{*小提示：想知道我爱我师的金质奖章是如何产生的吗？
                <br /><br />只有累计荣获“我爱我师”称号五次的优秀老师才可获得金质奖章*}>
                </p>
     </td>
      <td width="16"></td>
    </tr>
    <tr>
      <td></td>
      <td valign="top"/>
<hr />
 </tr>
 </tbody>
 </table>
 </div>

	<{section name=detail loop=$major}>
		<div id="major">
			<div id="majorimg" >
				<img src="<{$major[detail].img}>" style="float:left"/>
			<div style="height:230px; magin-top:20px;">
			<{$major[detail].comments}>
			</div>
			</div>
		</div>
	<{/section}>
<{/if}>

<{if $glodenMedel == true}>
	<div class="md toupiao">
  <table border="0" cellpadding="0" cellspacing="0" class="main" width="100%"><tbody>
     <tr>
       <td height="87" width="30"></td>
      <td class="tips">
		<p class="att">数据正在统计中，敬请期待！<{*小提示：想知道我爱我师的金质奖章是如何产生的吗？
		<br /><br />只有累计荣获“我爱我师”称号五次的优秀老师才可获得金质奖章*}>
		</p>
     </td>
      <td width="16"></td>
    </tr>
    <tr>
      <td></td>
      <td valign="top"/>
<hr />	 
 </tr>
 </tbody>
 </table>
 </div>
<{/if}>
</div>
<{include file="footer.tpl"}>
