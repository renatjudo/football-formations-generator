<?php
include ("classes.php");
include ("functions.php");
if (isset ($_POST['caption']) AND $_POST['caption']!=''){
$caption=htmlspecialchars($_POST['caption']);
}
else $caption='�����������';
if (isset ($_GET['c1'])&& isset ($_GET['c2'])){
$color[1]=hex2RGB($_GET['c1']);
$color[2]=hex2RGB($_GET['c2']);
}
else {
$color[1]=hex2RGB($_POST['c1']);
$color[2]=hex2RGB($_POST['c2']);
}
$players=$_POST['player'];
$pitch=new pitch($caption, $color, $players);
?>
<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251">
	<title>��������� ����������� ���� v. 3.0</title>
	<link type="text/css" href="style.css" rel="stylesheet" />
	</head>
<body>
<table id="wrapper">

<tr><td>
<?php
$img=$pitch->drawField('save');
?>
<img src='<?=$img;?>'>
</td></tr>
<tr><td>
<p class="warning" style="width:500px;">� ����� �������� ����� �� ��������, ������� ���� ��������� 500 ��������, ������� ���� ��� ���� ����� ������ �� ����������, � ������ - �������������� �� �������������</p>
<p><b>����� ��������:</b></p>
<input type="text" value="http://www.ezheloko.ru/tactic/<?=$img;?>" style="width:375px;" />
</td></tr>
<tr><td>
<p><b>��� ��� ������� �� lokomotiv.info:</b></p>
<textarea>
[url=http://www.ezheloko.ru/tactic][img=http://www.ezheloko.ru/tactic/<?=$img;?>][/url]
</textarea>
</td></tr>
<tr><td>
<p><b>��� ��� ������� HTML</b></p>
<textarea>
<a href="http://www.ezheloko.ru/tactic" target="blank"><img src="http://www.ezheloko.ru/tactic/<?=$img;?>" /></a>
</textarea>
</td></tr>
</table>
</body>
</html>