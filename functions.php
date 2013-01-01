<?php 

  // Преобразование Windows 1251 -> Unicode
  function win2uni($s)
  {
    $s = convert_cyr_string($s,'w','i'); // преобразование win1251 -> iso8859-5
    // преобразование iso8859-5 -> unicode:
    for ($result='', $i=0; $i<strlen($s); $i++) {
      $charcode = ord($s[$i]);
      $result .= ($charcode>175)?"&#".(1040+($charcode-176)).";":$s[$i];
    }
    return $result;
  }

function imagefilterhue($im,$r,$g,$b){

    $col = array($r,$b,$g);
    $height = imagesy($im);
    $width = imagesx($im);
    for($x=0; $x<$width; $x++){
        for($y=0; $y<$height; $y++){
			$pixelrgb = imagecolorat($im,$x,$y);
			$cols = imagecolorsforindex($im, $pixelrgb);
			$r = $cols['red'];
			$g = $cols['green'];
			$b = $cols['blue'];
			$alpha = $cols['alpha'];
            $newR = $col[0];
            $newG = $col[2];
            $newB =$col[1];
            imagesetpixel($im, $x, $y,imagecolorallocatealpha($im, $newR, $newG, $newB, $alpha));
        }
    }
	
return $im;
}

/**
 * Преобразовывает html код цвета в его rgb эквивалент
 */
function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Вытягиваем только цвет
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //Если указан цвет полностью (#000000)
        $colorVal = hexdec($hexStr);
        $rgbArray['r'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['g'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['b'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //если указана урезаная версия (#000)
        $rgbArray['r'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['g'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['b'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Не правильный код
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // возвращаем как строку, или как ассоциативный массив
} 
function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
    if(!isset($pct)){
        return false;
    }
    $pct /= 100;
    // Get image width and height
    $w = imagesx( $src_im );
    $h = imagesy( $src_im );
    // Turn alpha blending off
    imagealphablending( $src_im, false );
    // Find the most opaque pixel in the image (the one with the smallest alpha value)
    $minalpha = 127;
    for( $x = 0; $x < $w; $x++ )
    for( $y = 0; $y < $h; $y++ ){
        $alpha = ( imagecolorat( $src_im, $x, $y ) >> 24 ) & 0xFF;
        if( $alpha < $minalpha ){
            $minalpha = $alpha;
        }
    }
    //loop through image pixels and modify alpha for each
    for( $x = 0; $x < $w; $x++ ){
        for( $y = 0; $y < $h; $y++ ){
            //get current alpha value (represents the TANSPARENCY!)
            $colorxy = imagecolorat( $src_im, $x, $y );
            $alpha = ( $colorxy >> 24 ) & 0xFF;
            //calculate new alpha
            if( $minalpha !== 127 ){
                $alpha = 127 + 127 * $pct * ( $alpha - 127 ) / ( 127 - $minalpha );
            } else {
                $alpha += 127 * $pct;
            }
            //get the color index with new alpha
            $alphacolorxy = imagecolorallocatealpha( $src_im, ( $colorxy >> 16 ) & 0xFF, ( $colorxy >> 8 ) & 0xFF, $colorxy & 0xFF, $alpha );
            //set pixel with the new color + opacity
            if( !imagesetpixel( $src_im, $x, $y, $alphacolorxy ) ){
                return false;
            }
        }
    }
    // The image copy
    imagecopy($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h);
} 

function drawCaption($string, $size, $angle){
		$font="font/tahomab.ttf";

		$bbox = imagettfbbox($size, $angle, $font, win2uni($string)); // определяем размер бокса под фамилию
		$width=$bbox[2]-$bbox[0]+5; // ширина бокса
		$height=$bbox[1]-$bbox[7]+5; // высота бокса
		
		$box=imagecreatetruecolor($width,$height); // создаем контейнер под всё
		$black = imagecolorallocate($box, 0, 0, 0);
		$transparent = imagecolorallocatealpha($box, 0, 0, 0, 127); // устанавливаем прозрачный цвет
		imagefill($box, 0, 0, $transparent); // заполняем прозрачностью
		imageSaveAlpha($box, true); // созраняем
		imageAlphaBlending($box, false); // копировать сюда будем вместе с настройками
		imagettftext($box, $size, $angle, 0, $height, $black, $font, $string); // накладываем имя-фамилию
		return $box;
}
function generateName($length = 8){
  $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
  $numChars = strlen($chars);
  $string = '';
  for ($i = 0; $i < $length; $i++) {
    $string .= substr($chars, rand(1, $numChars) - 1, 1);
  }
  return $string;
}

function drawField($team) {
		$field=imagecreatefromjpeg("img/field.jpg");
		foreach ($team->players as $player){
			$img=drawPlayer($player->number, $player->name);
			$width=imagesx($img);
			$height=imagesy($img);
			$posX=$player->x-($width-26)/2;
			$posY=$player->y-10;
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
