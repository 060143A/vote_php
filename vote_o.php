<?php
	header('Content-Type:text/html; charset=utf-8');
	if(isset($_POST['radio'])){
		include 'config.sql.php';
		$id = 0;
		$id = $_POST['radio']['value'];//投票的id
		$iipp=$_SERVER["REMOTE_ADDR"];//投票IP
		$counter = mysql_num_rows(mysql_query("SELECT * FROM votes WHERE 1",$link));//有多少个投票
		if($id <= $counter){//若这个投票id是有效的
			if(mysql_num_rows(mysql_query("SELECT * FROM voter WHERE ip = '$iipp'",$link)) > 0){//若IP存在
			/*
				$sql = "SELECT * FROM voter WHERE ip = '$iipp'";
				$result = mysql_query($sql,$link);
				$row = mysql_fetch_array($result);
				$lastdate = $row[2];
				$latetime = strtotime($lastdate);			
				if(time() - $latetime < 24 * 60 * 60)				
					echo "<script>alert('24小时只能投一次票。');location='index.php';</script>";
				else
				{
				$result = mysql_query("SELECT * FROM votes WHERE _id = '$id'",$link); 
				$idd = mysql_result($result, 0, "vote") + 1;  
				$sqlupdate =  "UPDATE `db_vote`.`votes` SET `vote` = '".$idd."' WHERE `votes`.`_id` =".$id;
				mysql_query($sqlupdate,$link);
				$result = mysql_query("SELECT * FROM voter WHERE ip = '$iipp'",$link); 
				$row = mysql_fetch_array($result);
				$iddd = $row[0];
				$utime = date("Y-m-d H:i:s", time());
				$sqlupdate =  "UPDATE `db_vote`.`voter` SET `lastdate` = '".$utime."' WHERE `voter`.`_id` =".$iddd;
				mysql_query($sqlupdate,$link);
				echo "<script>alert('投票成功！');location='index.php';</script>";
				}
				*/
				echo "<script>alert('您已经投过票了，请不要重复投票。');location='index.php';</script>";
			}
			else
			{ 
			$result = mysql_query("SELECT * FROM votes WHERE _id = '$id'",$link); //投票id的行
			$idd = mysql_result($result, 0, "vote") + 1;  //投票数+1
			$sqlupdate =  "UPDATE `db_vote`.`votes` SET `vote` = '".$idd."' WHERE `votes`.`_id` =".$id;     //更新记录
			mysql_query($sqlupdate,$link);
			$utime = date("Y-m-d H:i:s", time());//获取当前时间
			$sqlupdate =  "INSERT INTO `db_vote`.`voter` (`_id`, `ip`) VALUES ($id, '".$iipp."')";//更新ip记录        	
			mysql_query($sqlupdate,$link);		
			echo "<script>alert('投票成功-----！');location='index.php?p=result';</script>";
			}	
		}
	mysql_close();
	}

?>
