<?php
include 'config.sql.php';
include 'function.func.php';
require './libs/Smarty.class.php';

error_reporting(3);

date_default_timezone_set ( 'PRC' );
	$smarty = new Smarty ();
	$smarty->left_delimiter = '<{';
	$smarty->right_delimiter = '}>';
	session_start();
	if (! isset ( $_SESSION ['csrfToken'] )) {
		$csrf_token = uniqid ( md5 ( rand () ) );
		$_SESSION ['csrfToken'] = $csrf_token;
	} else
		$csrf_token = $_SESSION ['csrfToken'];
$smarty->assign ( 'showIndex', false );
$smarty->assign ( 'polls', true );
$smarty->assign ( 'loginFailed', false );
$smarty->assign ( 'showResult', false );
$smarty->assign ( 'showMajor', false );
$smarty->assign ( 'glodenMedel', false );
$smarty->assign( 'pollsuccess',false);
$smarty->assign('isLogin',false);
$smarty->assign ( 'csrf_token', $csrf_token );
$query = "SELECT COUNT( * ) num FROM (SELECT DISTINCT  `stuid` FROM  `voter` WHERE 1 )temp WHERE 1";
$result = query($query);
$row = mysqli_fetch_assoc($result);
$smarty->assign('numStu', $row['num']);

$page = isset ( $_REQUEST ['p'] ) ? $_REQUEST ['p'] : "";
$now=time();


// 这里是计算结束日期的
if($now>1654012799){
 	$page='result';
	$smarty->assign('isEnd',true);
}else{
	$smarty->assign('isEnd',false);
}

if(isset ($_SESSION["username"])&&empty($page)){
	header("Location:index.php?p=poll");
	$smarty->assign ( 'isLogin', true );
}else{
	$smarty->assign ( 'isLogin', false );
}
if($page == 'logout'){
	unset($_SESSION['username']);
	unset($_SESSION['login']);
	header('Location:index.php');
}
if ($page == 'poll') {
	if (! isset ( $_SESSION ['csrfToken'] )) {
		$csrf_token = uniqid ( md5 ( rand () ) );
		$_SESSION ['csrfToken'] = $csrf_token;
	} else
		$csrf_token = $_SESSION ['csrfToken'];
	$smarty->assign ( 'csrf_token', $csrf_token );
	$smarty->assign ( 'showIndex', false );
	$smarty->assign ( 'isLogin', false );
	$smarty->assign ( 'loginFailed', false );
	$smarty->assign ( 'showResult', false );
	$smarty->assign ( 'showMajor', false );
	$smarty->assign ( 'glodenMedel', false );
	$smarty->assign ( 'polls', true );
	if (isset ( $_SESSION ['login'] ) && isset ( $_SESSION ['login'] ) == true)
		$smarty->assign ( 'isLogin', true );
	if (isset ( $_REQUEST ['username'] ) && isset ( $_REQUEST ['password'] ) && $_REQUEST ['login'] == 1) {
		if ($_REQUEST ['csrf_token'] == $csrf_token) {
			if (login ( $_REQUEST ['username'], $_REQUEST ['password'] )) {
				$_SESSION ['login'] = true;
				$_SESSION ['username'] = $_REQUEST ['username'];
				$smarty->assign ( 'isLogin', true );
			} else {
				$smarty->assign ( 'loginFailed', true );
			}
		} else
			exit ( 'Access Denied' );
	}
	if (isset ( $_SESSION ['login'] ) && $_SESSION ['login'] == true) {
		$totalPolled = getTotalPolled ( $_SESSION ['username'] );
		if ($totalPolled < 10) {
			$choice = array ();
			getDetail ( $choice );
			$isPolled = getPolled ( $_SESSION ['username'] );
			$smarty->assign ( 'totalPolled', $totalPolled );
			$smarty->assign ( 'isPolled', $isPolled );
			$smarty->assign ( 'choice', $choice );
		} else {
			$smarty->assign ( 'showResult', true );
			$smarty->assign ( 'polls', false );
			$smarty->assign ( 'isLogin', false );
			$smarty->assign ( 'loginFailed', false );
			$smarty->assign ( 'showMajor', false );
			$smarty->assign ( 'glodenMedel', false );
			$smarty->assign ( 'showIndex', false );
			$choice = array ();
			getDetail ( $choice );
			$smarty->assign ( 'choice', $choice );
		}
	
	}
	
	if (isset ( $_REQUEST ['isPoll'] ) && $_REQUEST ['isPoll'] == 1) {
		if ($_REQUEST ['csrf_token'] == $csrf_token) {
			$status = "";
			for($i = 0; $i < 10; $i ++) {
				if (isset ( $_REQUEST ['checked'] [$i] ) && $_REQUEST ['checked'] [$i] > 0 && $_REQUEST ['checked'] [$i] < 43)
				    $status = updatePoll ( $_REQUEST ['checked'] [$i], $_SESSION ['username'] );
				if ($status == "Max times") {
					$smarty->assign ( 'maxTimes', true );
					break;
				}
				if ($status == "Same poll") {
					$smarty->assign ( 'samePoll', true );
				}
			}

			$smarty->assign ( 'fowardResult',true );
			$page = 'result';
		}
	}

}

if ($page == 'result') {
	$smarty->assign ( 'showResult', true );
	$smarty->assign ( 'polls', false );
	$smarty->assign ( 'isLogin', false );
	$smarty->assign ( 'loginFailed', false );
	$smarty->assign ( 'showMajor', false );
	$smarty->assign ( 'glodenMedel', false );
	$smarty->assign ( 'showIndex', false );
	$choice = array ();
	getDetail ( $choice );
	$smarty->assign ( 'choice', $choice );
}

if (isset ( $_REQUEST ['collage'] )) {
	$smarty->assign ( 'showIndex', false );
	$smarty->assign ( 'polls', false );
	$smarty->assign ( 'isLogin', false );
	$smarty->assign ( 'loginFailed', false );
	$smarty->assign ( 'showResult', false );
	$smarty->assign ( 'glodenMedel', false );
	$smarty->assign ( 'showMajor', true );
	$major = array ();
	switch ($_REQUEST ['collage']) {
		case 'tuhuan' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'yejin' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'cailiao' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'jixie' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'jitong' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'zidonghua' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'jingguan' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'wenfa' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'waiyu' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'shuli' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'huasheng' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'tiyu' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
		case 'wuzhuang' :
			getMajor ( $_REQUEST ['collage'], $major );
			break;
	}
	$smarty->assign ( 'major', $major );

}

if ($page == 'gm') {
	$smarty->assign ( 'polls', false );
	$smarty->assign ( 'isLogin', false );
	$smarty->assign ( 'loginFailed', false );
	$smarty->assign ( 'showResult', false );
	$smarty->assign ( 'showMajor', false );
	$smarty->assign ( 'showIndex', false );
	$smarty->assign ( 'glodenMedel', true );
}

$smarty->display (__DIR__.'/./templates/index.tpl' );
?>
