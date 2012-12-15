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
			imageAlphaBlending($field, true); // ���������� ���� ����� ������ � �����������
			imageSaveAlpha($field, true); // ���������
			imageCopy($field, $img, $player->position['x']+3, $player->position['y'], 0, 0, $width, $height); //�������� �������� � ������ � ������ ����
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
		$player=imagecreatetruecolor(35,35); // ������ �����������, ����� ��� ������������
		$transparent = imagecolorallocatealpha($player, 0, 0, 0, 127); // ������������� ���������� ����
		imagefill($player, 0, 0, $transparent); // ��������� �� ���������
		imageSaveAlpha($player, true); // ��������� ������������
		imageAlphaBlending($player, true); // ������ ���, ����� ��� ��� ������������ � ���������, ������������ ������ � ����������� ������������
		if ($type=="player"){
		$src1=imagecreatefrompng("shrt1.png"); // � �������� ���� �����, � ������� ���� ������������ ��������
		$src1=imagefilterhue($src1,$color[1]['r'],$color[1]['g'],$color[1]['b']);
		$src2=imagecreatefrompng("shrt2.png"); // � �������� ���� �����, � ������� ���� ������������ ��������
		$src2=imagefilterhue($src2,$color[2]['r'],$color[2]['g'],$color[2]['b']);
		imageCopy($player, $src1, 0, 0, 0, 0, 35, 35); //�������� �������� � ������ � ������ �������� (���� ��������, ��� ��������, ����������� �����, ����������Y �����, ���������� � ��������, ���������� Y ��������, ������ ��������, ������ ��������)
		imageCopy($player, $src2, 0, 0, 0, 0, 35, 35);
		$white = imagecolorallocate($player, 255, 255, 255); // ���������� ���� ������ - ���� �����
		$black = imagecolorallocate($player, $color[2]['r'],$color[2]['g'],$color[2]['b']); // ���������� ���� ������ - ���� ������
		imageAlphaBlending($player, true); // � ������ ������ ���, ����� �� ��� ����� ���������� ������� (������� �����), ����� ��������� ��������� ������������.
		$nbox = imagettfbbox(10, 0, $fontb, $this->number); // ���������� ������ ����� ��� �������
		$nwidth=$nbox[2]-$nbox[0]; // ������ �����
		$nposition=round((35/2)-($nwidth/2));
		imagettftext($player, 10, 0, $nposition, 20, $black, $fontb,$this->number); // ����������� �����
		}
		else if($type="goalie"){
		$src1=imagecreatefrompng("goalie.png"); // � �������� ���� �����, � ������� ���� ������������ ��������
		imageCopy($player, $src1, 0, 0, 0, 0, 35, 35); //�������� �������� � ������ � ������ �������� (���� ��������, ��� ��������, ����������� �����, ����������Y �����, ���������� � ��������, ���������� Y ��������, ������ ��������, ������ ��������)
		$white = imagecolorallocate($player, 255, 255, 255); // ���������� ���� ������ - ���� �����
		$black = imagecolorallocate($player,0,0,0); // ���������� ���� ������ - ���� ������
		imageAlphaBlending($player, true); // � ������ ������ ���, ����� �� ��� ����� ���������� ������� (������� �����), ����� ��������� ��������� ������������.
		$nbox = imagettfbbox(10, 0, $fontb, $this->number); // ���������� ������ ����� ��� �������
		$nwidth=$nbox[2]-$nbox[0]; // ������ �����
		$nposition=round((35/2)-($nwidth/2));
		imagettftext($player, 10, 0, $nposition, 20, $black, $fontb,$this->number); // ����������� �����
		}
		$bbox = imagettfbbox(10, 0, $font, win2uni($this->name)); // ���������� ������ ����� ��� �������
		$width=$bbox[2]-$bbox[0]; // ������ �����
		$height=$bbox[1]-$bbox[7]; // ������ �����
		$height+=40; // ��������� 40 �������� ��� ����������� �����
		if ($width<35) {$textPosition=round((35/2)-($width/2));$width=35;} else $textPosition=0; // ���� ������ ����� ��� ������ ������ ������ ����� - �������� �� �����. � ����� ������� �������.
		$box=imagecreatetruecolor($width,$height); // ������� ��������� ��� ��
		imagefill($box, 0, 0, $transparent); // ��������� �������������
		imageSaveAlpha($box, true); // ���������
		imageAlphaBlending($box, false); // ���������� ���� ����� ������ � �����������
		$x=round(($width/2)-(35/2)); // ������������� �������� � ������ ����������
		imageCopy($box, $player, $x, 0, 0, 0, 35, 35); //�������� �������� � ������ � ������ ����
		//imageAlphaBlending($box, true); //������� ��������� ������������
		imagettftext($box, 10, 0, $textPosition, $height-3, $white, $font,win2uni($this->name)); // ����������� ���-�������
		return $box; //���������� ��������
	}
}
?>