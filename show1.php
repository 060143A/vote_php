<?php
	header('Content-Type:text/html; charset=utf-8');
	
	require './libs/Smarty.class.php';
	include './config.sql.php';
	
	$smarty = new Smarty;
	$smarty->template_dir="/template/";
	
	$smarty->left_delimiter = '<{';
	$smarty->right_delimiter = '}>';
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;
	$int_options = array("options"=>
array("min_range"=>0, "max_range"=>12));
	$id=$_GET['id'];
	if($link && filter_var($id, FILTER_VALIDATE_INT,$int_options))
	{
		$res=mysql_query("SELECT url FROM `votes` WHERE `_id`=$id",$link);
                $row=mysql_fetch_row($res);
		if(!row)
		return;
		$smarty->assign("url",$row[0]);
		$smarty->assign("imglink",$id);
		$smarty->display('/ibk/www/xiaoqing/templates/show.tpl');
		
	}
	else
	{
	echo "非法操作，请返回";
	}
?>