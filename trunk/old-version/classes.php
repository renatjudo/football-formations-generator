<?php
class pitch {
	var $caption;
	var $logo;
	var $color;
	var $players;
	var $coach;
	
	function pitch($caption, $color,  $players){
		$this->caption=$caption;
		$this->color=$color;
		$i=1;
		foreach ($players as $player){
			$this->players[$i]= new player($player['name'], $player['number'], $player['position']);
			$i++;
		}
	}

	function drawField() {
		$field=imagecreatefromjpeg("field.jpg");
		$i=0;
		foreach ($this->players as $player){
			if ($i==0){$img=$player->drawPlayer($this->color,"goalie");}
			else {$img=$player->drawPlayer($this->color);}
			$i++;
			$width=imagesx($img);
			$height=imagesy($img);
			imageAlphaBlending($field, true); // копировать сюда будем вместе с настройками
			imageSaveAlpha($field, true); // созраняем
			imageCopy($field, $img, $player->position['x']+3, $player->position['y'], 0, 0, $width, $height); //копируем картинку с формой в пустой бокс
		}		
		$caption=drawCaption($this->caption,28,0);
		$x=(imagesX($field)/2)-(imagesX($caption)/2);
		imagecopymerge_alpha( $field , $caption, $x , 10 , 0 , 0 , imagesX($caption) , imagesY($caption) , 30 );
		
		$copyright=drawCaption("http://www.ezheloko.ru/tactic", 12,0);
		imagecopymerge_alpha( $field , $copyright, 240 , imagesY($field)-25 , 0 , 0 , imagesX($copyright) , imagesY($copyright) , 30 );
		$name=generateName();
		$name="formations/".$name.".png";
		imagePng($field, $name);
		return $name;
		
	}
	
}

class player {
	var $name;
	var $number;
	var $position;
	function player($name, $number, $position){
		$this->name=$name;
		$this->number=$number;
		$this->position=$position;
		$this->amploua=$amploua;
		
	}
	function drawPlayer($color,$type="player"){
		$font="tahomab.ttf";
		$fontb="tahomab.ttf";
		$player=imagecreatetruecolor(35,35); // пустое изображение, нужно для прозрачности
		$transparent = imagecolorallocatealpha($player, 0, 0, 0, 127); // устанавливаем прозрачный цвет
		imagefill($player, 0, 0, $transparent); // заполняем им контейнер
		imageSaveAlpha($player, true); // сохраняем прозрачность
		imageAlphaBlending($player, true); // делаем так, чтобы все что копировалось в контейнер, копировалось вместе с настройками прозрачности
		if ($type=="player"){
		$src1=imagecreatefrompng("shrt1.png"); // И копируем нашу форму, в которой этой прозрачности завались
		$src1=imagefilterhue($src1,$color[1]['r'],$color[1]['g'],$color[1]['b']);
		$src2=imagecreatefrompng("shrt2.png"); // И копируем нашу форму, в которой этой прозрачности завались
		$src2=imagefilterhue($src2,$color[2]['r'],$color[2]['g'],$color[2]['b']);
		imageCopy($player, $src1, 0, 0, 0, 0, 35, 35); //копируем картинку с формой в пустую картинку (куда копируем, что копируем, координатаХ бокса, координатаY бокса, координата Х картинки, координата Y картинки, ширина картинки, высота картинки)
		imageCopy($player, $src2, 0, 0, 0, 0, 35, 35);
		$white = imagecolorallocate($player, 255, 255, 255); // определяем цвет текста - пока белый
		$black = imagecolorallocate($player, $color[2]['r'],$color[2]['g'],$color[2]['b']); // определяем цвет текста - пока черный
		imageAlphaBlending($player, true); // А теперь делаем так, чтобы то что будет нарисовано позднее (наложен текст), брало имеющиеся настройки прозрачности.
		$nbox = imagettfbbox(10, 0, $fontb, $this->number); // определяем размер бокса под фамилию
		$nwidth=$nbox[2]-$nbox[0]; // ширина бокса
		$nposition=round((35/2)-($nwidth/2));
		imagettftext($player, 10, 0, $nposition, 20, $black, $fontb,$this->number); // накладываем номер
		}
		else if($type="goalie"){
		$src1=imagecreatefrompng("goalie.png"); // И копируем нашу форму, в которой этой прозрачности завались
		imageCopy($player, $src1, 0, 0, 0, 0, 35, 35); //копируем картинку с формой в пустую картинку (куда копируем, что копируем, координатаХ бокса, координатаY бокса, координата Х картинки, координата Y картинки, ширина картинки, высота картинки)
		$white = imagecolorallocate($player, 255, 255, 255); // определяем цвет текста - пока белый
		$black = imagecolorallocate($player,0,0,0); // определяем цвет текста - пока черный
		imageAlphaBlending($player, true); // А теперь делаем так, чтобы то что будет нарисовано позднее (наложен текст), брало имеющиеся настройки прозрачности.
		$nbox = imagettfbbox(10, 0, $fontb, $this->number); // определяем размер бокса под фамилию
		$nwidth=$nbox[2]-$nbox[0]; // ширина бокса
		$nposition=round((35/2)-($nwidth/2));
		imagettftext($player, 10, 0, $nposition, 20, $black, $fontb,$this->number); // накладываем номер
		}
		$bbox = imagettfbbox(10, 0, $font, win2uni($this->name)); // определяем размер бокса под фамилию
		$width=$bbox[2]-$bbox[0]; // ширина бокса
		$height=$bbox[1]-$bbox[7]; // высота бокса
		$height+=40; // добавляем 40 пикселей для пиктограммы формы
		if ($width<35) {$textPosition=round((35/2)-($width/2));$width=35;} else $textPosition=0; // если ширина бокса для текста меньше ширины формы - обрезать не будем. А текст немного сместим.
		$box=imagecreatetruecolor($width,$height); // создаем контейнер под всё
		imagefill($box, 0, 0, $transparent); // заполняем прозрачностью
		imageSaveAlpha($box, true); // созраняем
		imageAlphaBlending($box, false); // копировать сюда будем вместе с настройками
		$x=round(($width/2)-(35/2)); // позиционируем картинку с формой посередине
		imageCopy($box, $player, $x, 0, 0, 0, 35, 35); //копируем картинку с формой в пустой бокс
		//imageAlphaBlending($box, true); //вертаем настройки прозрачности
		imagettftext($box, 10, 0, $textPosition, $height-3, $white, $font,win2uni($this->name)); // накладываем имя-фамилию
		return $box; //возвращаем картинку
	}
}
?>