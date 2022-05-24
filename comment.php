<?php
require 'config.sql.php';
require 'function.func.php';
session_start();
if($_GET['proID'] =="" || $_GET['content']=="" ||time == "")
{
	echo "非法操作";
}
elseif(eregi("^[0-9]+$",$_GET['proID'] ))
{
	$id=$_GET['proID'];
	$content=daddslashes($_GET['content']);
	$sql="INSERT INTO wishwell(`wish`,`name`,`teacherid`) VALUES('$content','$_SESSION[username]','$id')";
	$query=mysql_query($sql);
	if($query)
	echo "发送成功";
	else
	echo "发送失败";
}
?>