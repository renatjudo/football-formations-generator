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
?>
