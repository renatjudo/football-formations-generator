<?php
include ("classes.php");
include ("functions.php");
?>

<html>
	<head>
		<title>��������� ����������� ���� v. 3.0</title>
		<meta http-equiv="content-type" content="text/html; charset=windows-1251">
		<link type="text/css" href="style.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/colorpicker.css" type="text/css" />
		<link type="text/css" href="jquery-ui-1.8.16.custom.css" rel="stylesheet" />		
		<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="js/colorpicker.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
	</head>
<?php include("script.php");?>

<body>
<?/*
<form name="myForm" action="savefield.php" method="POST" onsubmit="return false;">
<table id="wrapper">
<tr class="header">
	<td colspan="2">
		<h2>��������� ����������� ���� (������ 3.0)</h2>
	</td>
</tr>
<tr id="teamCaption">
	<td colspan="2">
		<label for="caption">�������:</label><input id="caption" type="text" name="caption">
	</td>
</tr>
<tr class="formcolor">
	<td colspan="2">
		<label for="colorpickerField1">�������� ���� �����:</label> <input maxlength="6" size="6" id="colorpickerField1" value="ff0000" type="text" name="c1">
	</td>
</tr>
<tr class="formcolor">
	<td colspan="2">
		<label for="colorpickerField1">�������������� ���� �����:</label> <input maxlength="6" size="6" id="colorpickerField2" value="00ff00" type="text" name="c2">
	</td>
</tr>
<tr>
	<td id="fieldtd">
		<div id="field">
			<div>
				<img id="parent" src="field.jpg">
			</div>
			<table id="players"><tr>
				<td style="width:35px;">
					<div id="player1">
						<div class="goalienumber" id="player1number"></div>
						<div class="name" id="player1name"></div>
						<div style="width:35px"></div>
					</div>
				</td>
				<?php
				for($i=2; $i<12; $i++){
				?>
				<td style="width:35px;">
					<div id="player<?=$i;?>" class="positionable">
						<div class="number" id="player<?=$i;?>number"></div>
						<div class="name" id="player<?=$i;?>name"></div>
						<div style="width:35px"></div>
					</div>
				</td>
				<?php;}?>	
			</tr></table>
		</div>
	</td>
	<td id="playerstd">
		<div id="form">

			
			<table><tr><td style="text-align:center">�</td><td style="text-align:center;">��� ������</td></tr>
				<?php
				for($i=1; $i<12; $i++){
				?>
			<tr>
				<td>
					<input class="inputNumber" type="text"  id="number<?=$i;?>" name="player[<?=$i;?>][number]" style="width:40px;">
				</td>
				<td>
					<input type="text" id="name<?=$i;?>" name="player[<?=$i;?>][name]">
					<input type="hidden" id="player<?=$i;?>positionX" name="player[<?=$i;?>][position][x]">
					<input type="hidden" id="player<?=$i;?>positionY" name="player[<?=$i;?>][position][y]">
				</td>
			</tr>
			<?php;}?>
			<tr>
			<td colspan="2" style="text-align:center"><input type="submit" value="���������" onclick="document.forms['myForm'].submit();"></td></tr>
			</table>	
			
	
		</div>
	</td>
</tr>
<tr>
	<td id="iconSet">
		<?php
		for($i=1; $i<12; $i++){
		?>
		<div id="icon<?=$i;?>" class="icon"></div>
		<?php;}?>
	<td>
	<td></td>
</tr>
<tr><td style="width:750px;" colspan="2">
<h2>���������� �� ����������</h2>
<p>1) ���� "�������" - ����� ������ �������� �������, ��� ������� �������� �����������. ��� ��������� �� �������� �������� ������ ����, ��� ���������</p>
<p>2) �������� � �������������� ����� ����� - ������ ���� ����� ��� �����, � ����� ���� ������ ��� �������. ��������� ������ ����� �������� �����</p>
<p>3) ����� ������� (10 ������� � ���� ����������) ����� ������������� �� ����, �� �������������� ����������.</p>
<p>4) ������ �������� ������ � ����� �������. ����� ������� ����� �������� �� �����������(������� ���� ����, ��� ������ ������� ������� "����"), ��������������� ������ - ����� ����������� ����� � ���������� ������.</p>
<p>5) ������ "���������" ��������� ������������ �������� ��� png-����</p>
</td></tr>
</table>
</form><center>
<? */?>
Coming soon..<br>
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='http://www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t26.5;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet: �������� ����� ����������� ��"+
" �������' "+
"border='0' width='88' height='15'><\/a>")
//--></script><!--/LiveInternet--></center>
</body>
</html>


