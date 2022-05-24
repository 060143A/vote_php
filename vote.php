<?php
	header('Content-Type:text/html; charset=utf-8');
	$iipp=$_SERVER["REMOTE_ADDR"];
	if($iipp=="42.121.91.11")
	{
		$iipp=$_SERVER["HTTP_X_FORWARDED_FOR"];
		if(!filter_var($iipp,FILTER_VALIDATE_IP))
		{
			echo "非法操作，请返回";
		}
	}
	if(isset($_POST['selectid'])){
		include 'config.sql.php';
		if(mysql_num_rows(mysql_query("SELECT * FROM voter WHERE ip = '$iipp'",$link)) > 0)
			echo "<script>alert('您已经投过票了，请不要重复投票。');location='index.php';</script>";
		else
		{
			$vote_count = mysql_num_rows(mysql_query("select * from voter where stuid = '$iipp'"));
			$vote_limit = 10-$vote_count;
			$vote_idx = 0;

			$selectid=array();
			$selectid=$_POST['selectid'];
			foreach ($selectid as $id)
			{
				if($vote_idx>=$vote_limit) break;
				$result = mysql_query("SELECT * FROM votes WHERE _id = '$id'",$link); //投票id的行
				$idd = mysql_result($result, 0, "vote") + 1;  //投票数+1
				$sqlupdate =  "UPDATE `db_vote`.`votes` SET `vote` = vote + 1 WHERE `votes`.`_id` =".$id;     //更新记录
				//$sqlupdate =  "UPDATE `votes` SET `vote` = '".$idd."' WHERE `votes`.`_id` =".$id;
				mysql_query($sqlupdate,$link);
				$sqlupdate =  "INSERT INTO `db_vote`.`voter` (`_id`, `ip`) VALUES ($id, '".$iipp."')";//更新ip记录        	
				//$sqlupdate =  "INSERT INTO `voter` (`_id`, `ip`) VALUES ($id, '".$iipp."')";
				mysql_query($sqlupdate,$link);	
				$vote_idx++;
			}
			echo "<script>alert('投票成功！！！！');location='index.php';</script>";	
		}		
	mysql_close();
	}

?>
