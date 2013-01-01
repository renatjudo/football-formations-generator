<?php
// Подключаемся к серверу MySQL
$hostname = 'localhost';
$username = 'root';
$password = '';

$db = mysql_connect($hostname, $username, $password)
    or die('connect to database failed');

// Устанавливаем нужную кодировку
mysql_set_charset('utf-8');

// Выбираем нужную БД
mysql_select_db('generator')
    or die('db not found');
?>