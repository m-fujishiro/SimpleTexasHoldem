<?php
function Hand_Flush($arr, $card){
  
  $h = array(); $s = array();$c = array();$d = array();
  
  foreach ($arr as $i){
    switch($card[$i][0]){
      case "ハート"     : $h[] = $card[$i][1];break;
      case "スペード"   : $s[] = $card[$i][1];break;
      case "クローバー" : $c[] = $card[$i][1];break;
      case "ダイヤ"     : $d[] = $card[$i][1];break;
    }
  }

  if(count($h)>4) return $h;
  if(count($s)>4) return $s;
  if(count($c)>4) return $c;
  if(count($d)>4) return $d;

  return false;

}

function Straight($arr, $card){
  foreach($arr as $i) $num[] = $card[$i][1];

  for($i=1;$i<=10;$i++){
    if(in_array($i, $num)){
      if(in_array($i+1, $num) && in_array($i+2, $num) && in_array($i+3, $num) && 
	      ( ($i == 10 && in_array(1, $num)) || in_array($i+4, $num) )){
      	$rtn = range($i, $i+4);
	return $rtn;
      }
    }
  }
  return false;
} 

function Num_of_a_Kind($arr, $no, $card){
  $rtn = false;
  foreach ($arr as $i) $num[] = $card[$i][1];
  
  for ($i=1;$i<=13;$i++)
  if(count(array_keys($num, $i)) >= $no) {
          return $i;
  }
  
  return false;
  
}

function Full_House($arr, $card){
  foreach($arr as $i) $num[] = $card[$i][1];
  $rtn = [0, 0];
  for($i=1;$i<=13;$i++){
    $cnt[] = count(array_keys($num, $i)); 
    if($cnt[$i-1] == 2) $rtn = [$i, $rtn[1]];
    if($cnt[$i-1] == 3) $rtn = [$rtn[0], $i];
  }
  if(in_array(2, $cnt) && in_array(3, $cnt)) return $rtn;
  return false;
}

function Two_Pair($arr, $card){
  $hoge = false;
  foreach($arr as $i) $num[] = $card[$i][1];

  for($i=1;$i<=13;$i++)
  if(count(array_keys($num, $i)) > 1) {
    if($hoge){
	  $rtn = ($hoge == 1) ? [1,$i] : [$i, $hoge];
	  $fuga = array_diff($num, [$i, $hoge]);
          $fuga = array_values($fuga);
	  $fuga = in_array(1, $fuga) ? 1 : max($fuga);
	  $rtn[] = $fuga;
	  return $rtn;
    } else $hoge = $i;
   }
  return false;
}

function High_Card($arr_p, $arr_d, $card){

  foreach($arr_d as $i) $num_d[] = $card[$i][1];
  foreach($arr_p as $i) $num_p[] = $card[$i][1];

  rsort($num_d); rsort($num_p);
  
  if(in_array(1, $num_d) && !in_array(1, $num_p)) return "私";
  if(in_array(1, $num_p) && !in_array(1, $num_d)) return "お客様";
  
  // 要検証…？
  for($i=0;$i<count($num_p);$i++){
      if($num_p[$i] > $num_d[$i]) return "お客様";
      if($num_p[$i] > $num_d[$i]) return "私";
  }

  return "私";

}

function High($arr, $card){

  foreach($arr as $i) $num[] = $card[$i][1];

  if (in_array(1, $num)) return 14;

  return max($num);
}

function High_Num($player, $dealer){
	if($player == $dealer) return "私";
	for($i=0;;$i++){
		if($player[$i] == $dealer[$i]) continue;
		if($player[$i] == 1) return "お客様";
		if($dealer[$i] == 1) return "私";
		return ($player[$i] > $dealer[$i]) ? "お客様" : "私";
	}
}

$com = [4,5,6,7,8];

//ディーラーの役 
$hole_card_d = [2,3];
$d_card = array_merge($hole_card_d, $com);
$sf_card_d = $d_card;
if (Hand_Flush($d_card, $card)) {
  $dealer = ["フラッシュ", 4];
  $sf_card_d = Hand_Flush($d_card, $card);
} if (Straight($sf_card_d, $card))
  $dealer = isset($dealer) ? ["ストレートフラッシュ", 1] : ["ストレート", 5];
if (Num_of_a_Kind($d_card, 4, $card)){
    //これより強いストレートフラッシュと共存しない
    $dealer = ["フォー・オブ・ア・カインド", 2];
} else if (Full_House($d_card, $card))
    $dealer = ["フルハウス", 3];
if(!isset($dealer) && Num_of_a_Kind($d_card, 3, $card))
  $dealer = ["スリー・オブ・ア・カインド", 6];
if (!isset($dealer) && Two_Pair($d_card, $card))
  $dealer = ["ツーペア", 7];
if (!isset($dealer) && Num_of_a_Kind($d_card, 2, $card))
  $dealer = ["ワンペア", 8];
if (!isset($dealer)) $dealer = ["ハイカード", 10];


//プレイヤーの役  
$hole_card_p = [0,1];
$p_card = array_merge($hole_card_p, $com);
$sf_card_p = $p_card;
if(Hand_Flush($p_card, $card)){
  $player = ["フラッシュ", 4];
  $sf_card_p = Hand_Flush($p_card, $card);
} if(Straight($sf_card_p, $card))
  $player = (isset($player)) ? ["ストレートフラッシュ", 1] : ["ストレート", 5];
if(Num_of_a_Kind($d_card, 4, $card) ){
  if(! (isset($player) && $player[1]==1) )
    $player = ["フォー・オブ・ア・カインド", 2];
} else if (Full_House($p_card, $card))
    $player = ["フルハウス", 3];
if(!isset($player) && Num_of_a_Kind($p_card, 3, $card))
  $player = ["スリー・オブ・ア・カインド", 6];
if (!isset($player) && Two_Pair($p_card, $card))
  $player = ["ツーペア", 7];
if (!isset($player) && Num_of_a_Kind($p_card, 2, $card))
  $player = ["ワンペア", 8];
if (!isset($player)) $player = ["ハイカード", 10];

if($dealer[1] != $player[1]){
  $win = ($dealer[1] < $player[1]) ? "私" : "お客様";
} else if (in_array($player[1], [1, 4, 5, 10]))
            $win = High_Card($p_card, $d_card, $card);
else {
    foreach($hole_card_p as $i) $hole_num_p[] = $card[$i][1];
    foreach($hole_card_d as $i) $hole_num_d[] = $card[$i][1];

    switch($player[1]){
      //(ストレート)フラッシュ
      case 1:case 4:
        $win = High_Card($sf_card_p, $sf_card_d, $card); break;
      //フォーカード
      case 2:
        $p = Num_of_a_Kind($p_card, 4, $card);
        $d = Num_of_a_Kind($d_card, 4, $card);
	$p = array_merge($p, $hole_num_p);
	$d = array_merge($d, $hole_num_d);
	$win = High_Num($p, $d); break;
      //フルハウス
      case 3:
        $p = Full_House($p_card, $card);
        $d = Full_House($d_card, $card);
	$win = High_Num($p, $d); break;
      //ストレート
      case 5:
        $p = Straight($p_card, $card);
        $d = Straight($d_card, $card);
	rsort($p); rsort($d);
	$win = High_Num($p, $d); break;
      //スリーカード
      case 6:
        $p = Num_of_a_Kind($p_card, 3, $card);
        $d = Num_of_a_Kind($d_card, 3, $card);
	// 要検証
	$p = array_merge($p, $hole_num_p);
	$d = array_merge($d, $hole_num_d);
	$win = High_Num($p, $d); break;
      //ツーペア
      case 7:
        $p = Two_Pair($p_card, $card);
        $d = Two_Pair($d_card, $card);
	$p = array_merge($p, $hole_num_p);
	$d = array_merge($d, $hole_num_d);
	$win = High_Num($p, $d); break;
      //ワンペア
      case 8:
        $p = Num_of_a_Kind($p_card, 4, $card);
        $d = Num_of_a_Kind($d_card, 4, $card);
	$p = array_merge(array($p), $hole_num_p);
	$d = array_merge(array($d), $hole_num_d);
	$win = High_Num($p, $d); break;
      //ハイカード
      case 10:
        $win = High_Card($hole_card_p, $hole_card_d, $card); break;
    }
}

if($win != "私"){
	$coin += $raise * 4;
}


