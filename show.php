<?php
/*
*@计算输出各学院投票率
*@author 李新乐
*/
  header("Content-type:text/html;charset=utf-8");
	$link = mysqli_connect("localhost", "root", "ibeike.com","vote_ysyy");
	$query = "SET NAMES 'utf8'";
	$result =  mysqli_query($link,$query);
	//$query = "SELECT * FROM 2011info where xh not in (select stuid from ibk_extra_vote)";
	$query="select count(distinct `voter`.`stuid`) AS `voternum`,`mydata2`.`YXMC` AS `yxmc` 
from (`mydata2` join `voter` on((convert(`voter`.`stuid` using utf8) = `mydata2`.`XH`))) group by `mydata2`.`YXMC`";
	    
	$result =  mysqli_query($link,$query);
	$row=array();
	$res = array();
		while (($row= mysqli_fetch_assoc ($result)) ){
       $res[$row['yxmc']] =$row['voternum'];
     	}
     	$all=0;
     	$voter = 0;
     	$query="select count(distinct mydata2.XH) AS `allnum`,`mydata2`.`YXMC` AS `yxmc`
from mydata2 GROUP BY YXMC"; 
     	$result =  mysqli_query($link,$query);
     	echo "<table><tr><td>总人数</td><td>已投人数</td><td>学院名称</td><td>比例</td></tr>";
     	while (($row= mysqli_fetch_assoc ($result))){
     	    if($row['yxmc'] != '' ){
     	    echo "<tr><td>";
     	       echo $row['allnum'];
     	       $all +=$row['allnum'];
     	   echo  "</td><td>";
     	       echo $res[$row['yxmc']];
     	       $voter +=$res[$row['yxmc']];
     	   echo  "</td><td>";
     	        echo $row['yxmc'];
     	   echo  "</td><td>";
     	        $rate= $res[$row['yxmc']]/$row['allnum'];
     	        echo $rate;
     	    echo  "</td></tr>";
     	    
     	    }
     	}	
     	$rate= $voter/$all;
  
     	echo "<tr><td>$all</td><td>$voter</td><td>总和</td><td>$rate</td></tr></table>";
	//var_dump($row);
	
?>
