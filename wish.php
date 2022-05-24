<?php
require './libs/Smarty.class.php';
require './config.sql.php';
date_default_timezone_set ( 'PRC' );
	$smarty = new Smarty ();
	$smarty->left_delimiter = '<{';
	$smarty->right_delimiter = '}>';
	$smarty->debugging = false;
$result=array();	
$query = mysql_query("SELECT * FROM notes ORDER BY id DESC");
while($row=mysql_fetch_assoc($query))
{
	list($left,$top,$zindex) = explode('x',$row['xyz']);
	$tmp=array("left"=>$left,"top"=>$top,"zindex"=>$zindex);
	$row=array_merge($row,$tmp);
	$result[]=$row;
}
$smarty->assign("result",$result);

$smarty->display ( '/ibk/www/xiaoqing/templates/wish.tpl' );
$smarty->display ( __DIR__.'/./templates/wish.tpl' );
?>
