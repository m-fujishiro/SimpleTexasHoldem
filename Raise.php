<html>
<head>
<title>Casino</title>
<meta http-equiv="Content-Style-Type" content="text/css">
<style type="text/css">
<!--
body {
  text-align : center;
//  border: 1px solid #aaa;
  position : relative;
  height : 100%;
  width: 100%;
  margin: auto;
}
div {
  margin: auto;
//  border: 1px solid #aaa;
  text-align : center;
}
img {
  height : 100%;
  width: auto;
  text-align : center;
}

button {
  height : 100%;
  width : 100%;
  text-align : center;
  padding : 0% 30% 0% 30%;
}

.Card {
  height : 18%;
  width : 6%;
  text-align : center;
  display: flex;
}

--> 
</style>
<?php 
include("CreateDB.php");
include("Init.php");
include("load.php");
//$coin = 100;
include("load_hoge.php");

$coin -= $raise;
include("save.php");

//勝敗判定及び勝った場合のコインの増加
include("game.php");
include("save.php");


$db -> query("update bet set raise=false;");

?>

<meta http-equiv="refresh" content="5;URL=Shuffle.php">

<!-input type="button" value="戻る" onclick = "window.location.href = 'Shuffle.php'"->

</head>
<body>
<span style="float : right; padding : 0% 10% 0% 0%;">Coin : <?php echo $coin;?></span>
<div style="height : 35%;">
  <img src="Images/ディーラー.jpg" alt="ディーラー">
</div>
<?php echo $player[0];?>と<?php echo $dealer[0];?>で<?php echo $win;?>の勝利です。
<div class="Card" style="margin : 0% 44%;">
<?php

  print "<img src='Images/{$card[2][0]}/{$card[2][1]}.png' alt='{$card[2][0]}の{$card[2][1]}'>";
  print "<img src='Images/{$card[3][0]}/{$card[3][1]}.png' alt='{$card[3][0]}の{$card[3][1]}'>";

?>
</div>
<div class="Card" style="margin : 0% 35%;">
<?php

  print "<img src='Images/{$card[4][0]}/{$card[4][1]}.png' alt='{$card[4][0]}の{$card[4][1]}'>";
  print "<img src='Images/{$card[5][0]}/{$card[5][1]}.png' alt='{$card[5][0]}の{$card[5][1]}'>";
  print "<img src='Images/{$card[6][0]}/{$card[6][1]}.png' alt='{$card[6][0]}の{$card[6][1]}'>";
  print "<img src='Images/{$card[7][0]}/{$card[7][1]}.png' alt='{$card[7][0]}の{$card[7][1]}'>";
  print "<img src='Images/{$card[8][0]}/{$card[8][1]}.png' alt='{$card[8][0]}の{$card[8][1]}'>";

?>
</div>
<div class="Card" style="margin : 0% 44%;">
<?php

  print "<img src='Images/{$card[0][0]}/{$card[0][1]}.png' alt='{$card[0][0]}の{$card[0][1]}'>";
  print "<img src='Images/{$card[1][0]}/{$card[1][1]}.png' alt='{$card[1][0]}の{$card[1][1]}'>";

?>
</div>

</body>
</html>
