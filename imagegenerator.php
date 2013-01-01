<?php

/*
Данный файл будет делать одну единственную вещь - генерировать картинку исходя из данных JSON-модели. 
Для начала JSON-модель будет задана переменной, затем будет передоваться из скрипта.
*/
include_once("functions.php");

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