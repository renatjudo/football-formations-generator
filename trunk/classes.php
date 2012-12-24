<?php

	function drawField($team) {
		$field=imagecreatefromjpeg("img/field.jpg");
		foreach ($team->players as $player){
			$img=drawPlayer($player->number, $player->name);
			$width=imagesx($img);
			$height=imagesy($img);
			$posX=$player->x-($width-46)/2;
			$posY=$player->y-8;
			imageAlphaBlending($field, true); // копировать сюда будем вместе с настройками
			imageSaveAlpha($field, true); // сохраняем
			imageCopy($field, $img, $posX, $posY, 0, 0, $width, $height); //копируем картинку с формой в пустой бокс
		}		
		
		$copyright=drawCaption("http://www.ezheloko.ru/tactic", 12,0);
		imagecopymerge_alpha( $field , $copyright, 240 , imagesY($field)-25 , 0 , 0 , imagesX($copyright) , imagesY($copyright) , 30 );
		$name=generateName();
		$name="formations/".$name.".png";
		imagePng($field, $name);
		return $name;
	}
	
	function drawPlayer($number,$name){
		$font="font/tahomab.ttf";
		$fontb="font/tahomab.ttf";
		$player=imagecreatetruecolor(46,46); // пустое изображение, нужно для прозрачности
		$transparent = imagecolorallocatealpha($player, 0, 0, 0, 127); // устанавливаем прозрачный цвет
		imagefill($player, 0, 0, $transparent); // заполняем им контейнер
		imageSaveAlpha($player, true); // сохраняем прозрачность
		imageAlphaBlending($player, true); // делаем так, чтобы все что копировалось в контейнер, копировалось вместе с настройками прозрачности
		$src1=imagecreatefrompng("img/tshirt.png"); // И копируем нашу форму, в которой этой прозрачности завались
		imageCopy($player, $src1, 0, 0, 0, 0, 46, 46); //копируем картинку с формой в пустую картинку (куда копируем, что копируем, координатаХ бокса, координатаY бокса, координата Х картинки, координата Y картинки, ширина картинки, высота картинки)
		$white = imagecolorallocate($player, 255, 255, 255); // определяем цвет текста - белый
		$black = imagecolorallocate($player, 0, 0, 0); // определяем цвет текста - черный
		imageAlphaBlending($player, true); // А теперь делаем так, чтобы то что будет нарисовано позднее (наложен текст), брало имеющиеся настройки прозрачности.
		$nbox = imagettfbbox(10, 0, $fontb, $number); // определяем размер бокса под номер
		$nwidth=$nbox[2]-$nbox[0]; // ширина бокса
		$nposition=round((46/2)-($nwidth/2));
		imagettftext($player, 10, 0, $nposition, 30, $white, $fontb, $number); // накладываем номер
		$bbox = imagettfbbox(10, 0, $font, $name); // определяем размер бокса под фамилию
		$width=$bbox[2]-$bbox[0]; // ширина бокса
		$height=$bbox[1]-$bbox[7]; // высота бокса
		$height+=50; // добавляем 50 пикселей для пиктограммы формы
		if ($width<46) {$textPosition=round((46/2)-($width/2)); $width=46;} else $textPosition=0; // если ширина бокса для текста меньше ширины формы - обрезать не будем. А текст немного сместим.
		$box=imagecreatetruecolor($width,$height); // создаем контейнер под всё
		imagefill($box, 0, 0, $transparent); // заполняем прозрачностью
		imageSaveAlpha($box, true); // созраняем
		imageAlphaBlending($box, false); // копировать сюда будем вместе с настройками
		$x=round(($width/2)-(46/2)); // позиционируем картинку с формой посередине
		imageCopy($box, $player, $x, 0, 0, 0, 46, 46); //копируем картинку с формой в пустой бокс
		//imageAlphaBlending($box, true); //вертаем настройки прозрачности
		imagettftext($box, 10, 0, $textPosition, $height-3, $white, $font, $name); // накладываем имя-фамилию
		return $box; //возвращаем картинку
	}

?>