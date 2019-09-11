<?php

function Riffle($card){
    for($i = 0; $i < count($card); $i++) {
        if($i < count($card) / 2){
            $A[] = $card[$i];
        } else {
            $B[] = $card[$i];
        }
    }
    $rtn = [];
    while(count($card)!= count($rtn)){
        array_push($rtn, array_shift($B), array_shift($A));
    }
    return $rtn;
}
function Stlip($card){
    $card2 = array_slice($card,16,20);
    $rtn = array_merge(array_slice($card,0,16), array_slice($card,-16));
    $rtn = array_merge(array_slice($card2,0,10), $rtn);
    $rtn = array_merge(array_slice($card2,10,5), $rtn);
    $rtn = array_merge(array_slice($card2,15,5), $rtn);
    
    return $rtn;
}

function MyShuffle($card, $num){
$rtn = $card;
  for($i=0;$i<$num;$i++){
    if($num%5==3){
        $rtn = Stlip($rtn);
    } else {
        $rtn = Riffle($rtn);
    }
  }
  return $rtn;
}



$coin = 100;

for($j = 0; $j < 4; $j++)
for($i = 1; $i <= 13; $i++){
    switch ($j) {
        case 0:
            $hoge = 'ハート';
            break;
        case 1:
            $hoge = 'スペード';
            break;
        case 2:
            $hoge = 'クローバー';
            break;
        case 3:
            $hoge = 'ダイヤ';
            break;
    }
    $card[] = [$hoge,$i];
}

MyShuffle($card, 5);

?>



