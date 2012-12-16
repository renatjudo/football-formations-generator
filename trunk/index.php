<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Генератор тактических схем</title>
    <link href="css/tactics2.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div class="tactics-field">
<div id="grid">
<?php
$alfabet= array("a","b","c","d","e","f","g","h","i","j");
	foreach ($alfabet as $letter){
		for($i=1;$i<19;$i++){
			echo "<div class='cell' id='".$letter.$i."'></div>\n";
	}
}
?>
</div>
    <!--
    <div class="tactics-field-player" style="left: 58px; top: 20px">
        <div class="tactics-field-player-number">8</div>
        <div class="tactics-field-player-name">Самир Насри</div>
    </div>
    <div class="tactics-field-player" style="left: 58px; top: 68px">
        <div class="tactics-field-player-number">29</div>
        <div class="tactics-field-player-name">Халк</div>
    </div>
    <div class="tactics-field-player" style="left: 58px; top: 116px">
        <div class="tactics-field-player-number">9</div>
        <div class="tactics-field-player-name">Роналдо Луис Назарио де Лима</div>
    </div>
    -->
</div>

<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="js/tactics2.js"></script>
</body>
</html>