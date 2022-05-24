<?php
	$host = "localhost";
	$user = "root";
	$pass = "BTSRMUVT56SDT8U6P";
	$dbname = "vote_ysyy";


	$link = mysqli_connect($host, $user, $pass,$dbname);
	$db_select = mysqli_select_db($link,$dbname);
	
	function query($str){
	    global $link;
	    $res=mysqli_query($link,$str);
	    return $res;
	}
	
	function fetch_assoc($str){
	    global $link;
	    $res=mysqli_fetch_assoc($str);
	    return $res;
	}
	query("set names utf8");

?>
