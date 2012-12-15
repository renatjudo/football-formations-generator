<?php
include ("functions.php");
$color[1]=hex2RGB($_GET['c1']);
$color[2]=hex2RGB($_GET['c2']);
$player=imagecreatetruecolor(35,35); // ������ �����������, ����� ��� ������������
$transparent = imagecolorallocatealpha($player, 0, 0, 0, 127); // ������������� ���������� ����
imagefill($player, 0, 0, $transparent); // ��������� �� ���������
imageSaveAlpha($player, true); // ��������� ������������
imageAlphaBlending($player, true); // ������ ���, ����� ��� ��� ������������ � ���������, ������������ ������ � ����������� ������������
$src1=imagecreatefrompng("shrt1.png"); // � �������� ���� �����, � ������� ���� ������������ ��������
$src1=imagefilterhue($src1,$color[1]['r'],$color[1]['g'],$color[1]['b']);
$src2=imagecreatefrompng("shrt2.png"); // � �������� ���� �����, � ������� ���� ������������ ��������
$src2=imagefilterhue($src2,$color[2]['r'],$color[2]['g'],$color[2]['b']);
imageCopy($player, $src1, 0, 0, 0, 0, 35, 35); //�������� �������� � ������ � ������ �������� (���� ��������, ��� ��������, ����������� �����, ����������Y �����, ���������� � ��������, ���������� Y ��������, ������ ��������, ������ ��������)
imageCopy($player, $src2, 0, 0, 0, 0, 35, 35);
header("Content-Type: image/png"); 
imagePng($player);
?>