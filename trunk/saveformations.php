<?php
include("mysql.php");
$query="INSERT INTO formations (`id` , `name` , `json`)
VALUES (NULL, '".$_POST['formation-name']."', '".$_POST['json']."');";
if (mysql_query($query)){
	echo "Сохранили схему ".$_POST['formation-name'];
}
else {
	echo "Сохранить схему не удалось";
}
?>