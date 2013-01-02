<?php
include ("simple_html_dom.php");
include ("mysql.php");
$teamname="Локомотив";
$url="http://rus.rfpl.org/index.php/club/clubmap/lokomotiv";
$tshirts="loko.png";

//Задача №1: вычленить из этого урла игроков и поместить в массив объектов игрок->имя, номер, амплуа, гражданство, день рождения, урл (пока только то что есть на первой странице, но класс создаем сразу)
class team {
	var $name;
	var $url;
	var $logo;
	var $players;
	var $tshirts;
}

class player {
	var $name;
	var $number;
	var $position;
	var $country;
	var $birthday;
	var $photo;
/*
	function player($name, $number, $position, $country, $birthday, $url, $photo, $games, $goals, $assists, $yellows, $reds){
		$this->name=$name;
		$this->number=$number;
		$this->position=$position;
		$this->country=$country;
		$this->birthday=$birthday;
		$this->url=$url;
		$this->photo=$photo;
		$this->games=$games;
		$this->goals=$goals;
		$this->assists=$assists;
		$this->yellows=$yellows;
		$this->reds=$reds;	
		return $this;
	}
*/
}
// Пока просто загрузим страницу и просто выведем определенных людей
$team=new team();
$team->name=$teamname;
$team->url=$url;
$team->tshirts=$tshirts;

$teamhtml = file_get_html($url);
$logo=$teamhtml->find('div[id=clubbiglogo] img',0);
$team->logo=$logo->src;
$i=0;

foreach ($teamhtml->find('table.playersorter') as $player){
	foreach ($player->find('tr') as $playerTR){
		$team->players[$i]=new player();
		$playerTD=$playerTR->find('td');
			$photo=$playerTR->find('img',0);
			$team->players[$i]->photo=$photo->src;
			$team->players[$i]->number=$playerTD[1]->plaintext;
			$team->players[$i]->name=$playerTD[2]->plaintext;
			$team->players[$i]->position=$playerTD[3]->plaintext;
			$team->players[$i]->country=$playerTD[4]->plaintext;
			$team->players[$i]->birthday=$playerTD[5]->plaintext;
			$i++;
	}
	
}

 $query="INSERT INTO teams (`id`, `name`, `logo`, `url`, `tshirts`) VALUES (NULL, '".$team->name."', '".$team->logo."', '".$team->url."', '".$team->tshirts."')";
 $result=mysql_query($query);
 $team_id=mysql_insert_id();
 foreach ($team->players as $player){
	 if ($player->name!=''){
		$player->name=str_replace("</a>","", $player->name);
		$nick=explode(" ", $player->name);
		$nick=$nick[0];
		 $query="INSERT INTO players (`id`, `team_id`, `number`, `name`, `nick`, `position`, `country`, `birthday`, `foto`) VALUES ('', '".$team_id."', '".$player->number."', '".$player->name."', '".$nick."', '".$player->position."', '".$player->country."', '".$player->birthday."', '".$player->photo."')";
		$result=mysql_query($query);
	 }
  }
