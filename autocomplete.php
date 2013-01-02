<?php
	include("mysql.php");
	$query="SELECT * FROM players WHERE nick LIKE '%".$_GET['term']."%'";
	$result=mysql_query($query);
	$json=array();
	while ($sql=mysql_fetch_assoc($result)){
		array_push($json, $sql);
	}
	$jsonstr=json_encode($json);
	echo $jsonstr;
?>