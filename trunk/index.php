<!DOCTYPE html>
<?php
include("mysql.php");
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Генератор тактических схем</title>

    <link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css" rel="stylesheet" />
    <link href="css/tactics.css" type="text/css" rel="stylesheet" />

    <style type="text/css">
        #tactics-container {
            height: 400px;
        }

        #debug {
            border-radius: 8px;
            -moz-border-radius: 8px;
            -webkit-border-radius: 8px;
            background-color: #ffdead;
            padding: 12px;
            font-family: Tahoma;
            font-size: small;
            width: 600px;
            clear: both;
            margin-top: 24px;
        }

        #debug-data {
            font-family: monospace;
            margin: 4px;
        }
    </style>
</head>
<body>

<div id="tactics-container">
    <div class="tactics-field"></div>

    <div class="tactics-player-list">
		<select name="formations" id="formations" style="width:115px;">
		<option name="reset" id="reset"></option>
		<?php
			$query="SELECT id, name from formations";
			$result=mysql_query($query);
			while ($option=mysql_fetch_array($result)){
				echo "<option name='".$option['name']."' value='".$option['id']."'>".$option['name']."</option>";
			}
		?>
		</select>
        <input type="button" class="tactics-button" id="add-player" value="Добавить игрока" /><br />
		<input type="checkbox" id="grid-on-off" name="grid-on-off" checked /> <label for="grid-on-off">Включить/выключить привязку к сетке</label>
		
    </div>

</div>

<div id="debug">
    <input type="button" class="tactics-button" id="debug-show-data" value="Показать данные расстановки" />
    <div id="debug-data"></div>
		<form method="POST" action="saveformations.php">
			<input type="hidden" class="json" name="json" value="" />
			Название тактики: <input type="text" style="width:100px;" name="formation-name" /><br />
			<input type="submit" class="tactics-button" id="save-formation" value="Сохранить тактику" />
		</form>
	<br />
		<form method="POST" action="imagegenerator.php">
			<input type="hidden" class="json" name="json" value="" />
			<input type="submit" class="tactics-button" id="get-image" value="сделать картинку" />
		</form>
</div>
<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script src="js/tactics.js"></script>
</body>
</html>