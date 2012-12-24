<?php
/*
Данный файл будет делать одну единственную вещь - генерировать картинку исходя из данных JSON-модели. 
Для начала JSON-модель будет задана переменной, затем будет передоваться из скрипта.
*/
include_once("classes.php");
include_once("functions.php");
/*
$jsonmodel='{"players":[{"name":"Гилерме","number":1,"x":"21px","y":"169px"},{"name":"Ещенко","number":2,"x":"117px","y":"41px"},{"name":"Бурлак","number":"3","x":"117px","y":"137px"},{"name":"Чорлука","number":"4","x":"117px","y":"201px"},{"name":"Шишкин","number":"5","x":"117px","y":"297px"},{"name":"Тигорев","number":"6","x":"189px","y":"169px"},{"name":"Глушаков","number":"7","x":"261px","y":"137px"},{"name":"Торбинский","number":"8","x":"261px","y":"201px"},{"name":"Обинна","number":"9","x":"309px","y":"73px"},{"name":"Самедов","number":"10","x":"309px","y":"265px"},{"name":"Павлюченко","number":"11","x":"346px","y":"165px"}]}';
*/
$jsonmodel=$_POST['json'];
$team=json_decode($jsonmodel);
/*
Пример обращения к переменным из модели
$team->players[0]->name;
$team->players[0]->number;
$team->players[0]->x;
$team->players[0]->y;
*/

$img=drawField($team);
echo "<img src=".$img.">";
?>