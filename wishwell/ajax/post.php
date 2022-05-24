<?php
session_start();
// Error reporting
error_reporting(E_ALL);
		$iipp=$_SERVER["REMOTE_ADDR"];
		if($iipp=="42.121.91.11")
		{
			$iipp=$_SERVER["HTTP_X_FORWARDED_FOR"];
			if(!filter_var($iipp,FILTER_VALIDATE_IP))
			{
				echo "0";
				die();
			}
		}
require "../connect.php";

// Checking whether all input variables are in place:
if(!is_numeric($_POST['zindex']) || !isset($_POST['author']) || !isset($_POST['body']) || !in_array($_POST['color'],array('yellow','green','blue')))
die("0");

if(ini_get('magic_quotes_gpc'))
{
	// If magic_quotes setting is on, strip the leading slashes that are automatically added to the string:
	$_POST['author']=stripslashes($_POST['author']);
	$_POST['body']=stripslashes($_POST['body']);
}

// Escaping the input data:

$author = mysql_real_escape_string(strip_tags($_POST['author']));
$body = mysql_real_escape_string(strip_tags($_POST['body']));
$color = mysql_real_escape_string($_POST['color']);
$zindex = (int)$_POST['zindex'];


if($_SESSION['wishwell'] == 1 || $_COOKIE['wishwell'] ==1)
	{
		echo '-1';
		die;
	}
else
	{
		$query=mysql_query("SELECT * FROM notes WHERE ip=$iipp");
		$result=mysql_result($query,0);
		if($result)
		{
			echo "-1";
			die;
		}
	}
mysql_query('	INSERT INTO notes (text,name,color,xyz,ip)
				VALUES ("'.$body.'","'.$author.'","'.$color.'","'.rand(0,728).'x'.rand(0,328).'x'.$zindex.'","'.$iipp.'")');
if(mysql_affected_rows($link)==1)
{
	setcookie("wishwell",1);
	$_SESSION['wishwell']=1;
	// Return the id of the inserted row:
	echo mysql_insert_id($link);
}
else echo '0';

?>