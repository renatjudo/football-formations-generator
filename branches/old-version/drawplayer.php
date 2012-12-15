<?php
include ("functions.php");
$color[1]=hex2RGB($_GET['c1']);
$color[2]=hex2RGB($_GET['c2']);
$player=imagecreatetruecolor(35,35); // пустое изображение, нужно для прозрачности
$transparent = imagecolorallocatealpha($player, 0, 0, 0, 127); // устанавливаем прозрачный цвет
imagefill($player, 0, 0, $transparent); // заполняем им контейнер
imageSaveAlpha($player, true); // сохраняем прозрачность
imageAlphaBlending($player, true); // делаем так, чтобы все что копировалось в контейнер, копировалось вместе с настройками прозрачности
$src1=imagecreatefrompng("shrt1.png"); // И копируем нашу форму, в которой этой прозрачности завались
$src1=imagefilterhue($src1,$color[1]['r'],$color[1]['g'],$color[1]['b']);
$src2=imagecreatefrompng("shrt2.png"); // И копируем нашу форму, в которой этой прозрачности завались
$src2=imagefilterhue($src2,$color[2]['r'],$color[2]['g'],$color[2]['b']);
imageCopy($player, $src1, 0, 0, 0, 0, 35, 35); //копируем картинку с формой в пустую картинку (куда копируем, что копируем, координатаХ бокса, координатаY бокса, координата Х картинки, координата Y картинки, ширина картинки, высота картинки)
imageCopy($player, $src2, 0, 0, 0, 0, 35, 35);
header("Content-Type: image/png"); 
imagePng($player);
?>