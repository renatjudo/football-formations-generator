<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>Генератор тактических схем</title>

    <link href="css/jquery-ui-1.9.2.custom.min.css" type="text/css" rel="stylesheet" />
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
        <input type="button" class="tactics-button" id="add-player" value="Добавить игрока" /><br />
		<input type="checkbox" id="grid-on-off" name="grid-on-off" checked /> <label for="grid-on-off">Включить/выключить привязку к сетке</label>
    </div>

</div>

<div id="debug">
    <input type="button" class="tactics-button" id="debug-show-data" value="Показать данные расстановки" />
    <div id="debug-data"></div>
	<form method="POST" action="imagegenerator.php">
	<input type="hidden" id="json" name="json" value="" />
	<input type="submit" class="tactics-button" id="get-image" value="сделать картинку" />
	</form>
</div>

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/tactics.js"></script>
</body>
</html>