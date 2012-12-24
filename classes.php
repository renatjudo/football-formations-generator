<?php

	function drawField($team) {
		$field=imagecreatefromjpeg("img/field.jpg");
		foreach ($team->players as $player){
			$img=drawPlayer($player->number, $player->name);
			$width=imagesx($img);
			$height=imagesy($img);
			$posX=$player->x-($width-46)/2;
			$posY=$player->y-8;
			imageAlphaBlending($field, true); // ���������� ���� ����� ������ � �����������
			imageSaveAlpha($field, true); // ���������
			imageCopy($field, $img, $posX, $posY, 0, 0, $width, $height); //�������� �������� � ������ � ������ ����
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
		$player=imagecreatetruecolor(46,46); // ������ �����������, ����� ��� ������������
		$transparent = imagecolorallocatealpha($player, 0, 0, 0, 127); // ������������� ���������� ����
		imagefill($player, 0, 0, $transparent); // ��������� �� ���������
		imageSaveAlpha($player, true); // ��������� ������������
		imageAlphaBlending($player, true); // ������ ���, ����� ��� ��� ������������ � ���������, ������������ ������ � ����������� ������������
		$src1=imagecreatefrompng("img/tshirt.png"); // � �������� ���� �����, � ������� ���� ������������ ��������
		imageCopy($player, $src1, 0, 0, 0, 0, 46, 46); //�������� �������� � ������ � ������ �������� (���� ��������, ��� ��������, ����������� �����, ����������Y �����, ���������� � ��������, ���������� Y ��������, ������ ��������, ������ ��������)
		$white = imagecolorallocate($player, 255, 255, 255); // ���������� ���� ������ - �����
		$black = imagecolorallocate($player, 0, 0, 0); // ���������� ���� ������ - ������
		imageAlphaBlending($player, true); // � ������ ������ ���, ����� �� ��� ����� ���������� ������� (������� �����), ����� ��������� ��������� ������������.
		$nbox = imagettfbbox(10, 0, $fontb, $number); // ���������� ������ ����� ��� �����
		$nwidth=$nbox[2]-$nbox[0]; // ������ �����
		$nposition=round((46/2)-($nwidth/2));
		imagettftext($player, 10, 0, $nposition, 30, $white, $fontb, $number); // ����������� �����
		$bbox = imagettfbbox(10, 0, $font, $name); // ���������� ������ ����� ��� �������
		$width=$bbox[2]-$bbox[0]; // ������ �����
		$height=$bbox[1]-$bbox[7]; // ������ �����
		$height+=50; // ��������� 50 �������� ��� ����������� �����
		if ($width<46) {$textPosition=round((46/2)-($width/2)); $width=46;} else $textPosition=0; // ���� ������ ����� ��� ������ ������ ������ ����� - �������� �� �����. � ����� ������� �������.
		$box=imagecreatetruecolor($width,$height); // ������� ��������� ��� ��
		imagefill($box, 0, 0, $transparent); // ��������� �������������
		imageSaveAlpha($box, true); // ���������
		imageAlphaBlending($box, false); // ���������� ���� ����� ������ � �����������
		$x=round(($width/2)-(46/2)); // ������������� �������� � ������ ����������
		imageCopy($box, $player, $x, 0, 0, 0, 46, 46); //�������� �������� � ������ � ������ ����
		//imageAlphaBlending($box, true); //������� ��������� ������������
		imagettftext($box, 10, 0, $textPosition, $height-3, $white, $font, $name); // ����������� ���-�������
		return $box; //���������� ��������
	}

?>