<?php


function daddslashes($string, $force = 0) {
	! defined ( 'MAGIC_QUOTES_GPC' ) && define ( 'MAGIC_QUOTES_GPC', get_magic_quotes_gpc () );
	if (! MAGIC_QUOTES_GPC || $force) {
		if (is_array ( $string )) {
			foreach ( $string as $key => $val ) {
				$string [$key] = daddslashes ( $val, $force );
			}
		} else {
			$string = addslashes ( $string );
		}
	}
	return $string;
}

function login($username, $pwd) {
	$reqcode=strtolower($_POST['code']);
	if($reqcode!=strtolower($_SESSION['code'])){
		return false;
	}

	$username = daddslashes (strtolower($username));
	/*$pwd = md5($pwd);
	$pwd = md5($pwd.'iBeiKe');*/
	if($username == "" || $pwd == "" ||!$username)
		return false;
	$query = "SELECT * FROM xuesheng  WHERE id='$username'";

	$link = mysqli_connect("localhost", "root", "ibeike.com","vote_ysyy");
	
	$result =  mysqli_query($link,$query);
	$row = mysqli_fetch_assoc($result);
	/*
	if (substr($row ['card'],-6) == $pwd) {
		$query = "UPDATE `stu` SET `last_login` = CURRENT_TIMESTAMP, `last_login_ip` = \"{$_SERVER["REMOTE_ADDR"]}\" WHERE `id` = \"{$row['id']}\"";
		query ( $query );
		return true;
	} else
		return false;
		*/
	if($row['card']==$pwd){
		return true;
	}else{
		return false;
	}
}

function getDetail(&$choice) {
	$query = "SELECT * FROM `votes` WHERE 1";
	$result = query ( $query );
	while ( $row = fetch_assoc ($result) ) {
		$choice [] = $row;
	}
}

function getPolled($name) {
	$query = "SELECT `id` FROM `voter` WHERE `stuid` = \"{$name}\"";
	$result = query ( $query );
	$returnArray = array ();
	for($i=1;$i<=40;$i++){
	    $returnArray [$i]=0;
	}
	while ( $row = fetch_assoc ($result) ) {
		$returnArray [$row['id']] = 1;
	}
	return $returnArray;
}

function getTotalPolled($name) {
	$query = "SELECT COUNT(*) FROM `voter` WHERE `stuid`=\"{$name}\"";
	$result = query ( $query );
	$row = mysqli_fetch_array ($result);
	return $row [0];
}

function updatePoll($id, $name) {
	$query = "SELECT count(*) FROM `voter` WHERE `stuid`=\"{$name}\"";
	
	$result = query ( $query );
	$num = mysqli_fetch_array ($result);
	
	if ($num [0] < 10) {
		$query = "SELECT count(*) FROM `voter` WHERE `stuid`=\"{$name}\" AND `id` = \"{$id}\"";
		$result = query ( $query );
		$num = mysqli_fetch_array ($result);
		$ip=get_client_ip();
		if ($num [0] == 0) {
			$query = "UPDATE `votes` SET `vote` = `vote` + 1 WHERE `_id` = \"{$id}\"";
			query ( $query );
			$query = "INSERT INTO `voter` (`stuid`,`ip`, `id`) VALUES(\"{$name}\",\"{$ip}\",\"{$id}\")";
			query ( $query );
			return "Success";
		} else
			return "Same poll";
	} else
		return "Max times";

}
function get_client_ip() {
	$ip = $_SERVER['REMOTE_ADDR'];
	if (isset($_SERVER['HTTP_X_REAL_FORWARDED_FOR']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_REAL_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_REAL_FORWARDED_FOR'];
	}
	elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	elseif (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}
	return $ip;
}
function getMajor($collage, &$major) {
	$query = "SELECT * FROM `waws_majorcourses` WHERE `collage` = \"{$collage}\"";
	$result = query( $query );
	while ( $row = fetch_assoc ($result) ) {
		$major [] = $row;
	}
}
?>
