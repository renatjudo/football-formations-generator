<?php
include("mysql.php");
$query="SELECT `json` FROM `formations` WHERE `id` = '".$_GET['id']."'";
if ($result=mysql_query($query)) {
	$line=mysql_fetch_array($result);
	echo $line['json'];
	}
?>