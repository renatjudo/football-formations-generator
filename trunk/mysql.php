<?php
// ������������ � ������� MySQL
$hostname = 'localhost';
$username = 'root';
$password = '';

$db = mysql_connect($hostname, $username, $password)
    or die('connect to database failed');

// ������������� ������ ���������
mysql_set_charset('utf-8');

// �������� ������ ��
mysql_select_db('generator')
    or die('db not found');
?>