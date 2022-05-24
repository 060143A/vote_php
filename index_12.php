<?php
	header('Content-Type:text/html; charset=utf-8');
	
	require './libs/Smarty.class.php';
	include './config.sql.php';
	
	$smarty = new Smarty;
	$smarty->template_dir="/template/";
	
	$smarty->left_delimiter = '<{';
	$smarty->right_delimiter = '}>';
	//$smarty->force_compile = true;
	$smarty->debugging = false;
	$smarty->caching = false;
	$smarty->cache_lifetime = 120;
	
	$people = array(1,2,3);
	$vote_last=$_SERVER['REQUEST_TIME'];
	class Choice{
			var $url;
			var $votes;
			var $name;
			var $image;
			var $type;
			var $id;
			var $_id;
			var $imglink;
			var $comment;
	}
	
	$choice[] = new Choice();
	

	if($link){
	
	$result = mysql_query("SELECT * FROM `votes` WHERE 1",$link);
 		for($i = 0; $row = mysql_fetch_array($result); $i++)
			{
			$choice[$i]->votes = $row[0];
			$choice[$i]->url = $row[1];
			$choice[$i]->name = $row[2];
			$choice[$i]->id = $i;
			$choice[$i]->_id = $row[3];
			$choice[$i]->comment = $row[4];
			$choice[$i]->imglink = $row[5];
			}
		mysql_close();
		
		$counter = count($choice);	
		$smarty->assign("counter",$counter);
		$smarty->assign("choice",$choice);

		$poll_id = "xqbstp";



		$smarty->display('/ibk/www/xiaoqing/templates/index.tpl');
		}
	else 
		{
		$smarty->display('/ibk/www/xiaoqing/templates/fail.tpl');
		}


?>
