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
  height : 80%;
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
if(isset($_POST["user"]))$user = $_POST["user"];

include("CreateDB.php");
include("Init.php");
include("load.php");
//$coin = 100;
include("load_hoge.php");

// 二回目以降もここに入ってしまう
if(!isset($_SESSION["bet"]) ||  $_SESSION["bet"]) {
  $bet = $_POST["bet"] / 2;
  $raise = $bet;
  $coin -= $bet;
  $card = MyShuffle($card, $_POST["shuffle_num"]);
  $_SESSION["bet"] = false;
  include("save.php");
  include("save_hoge.php");
}

?>


</head>
<body>
<span style="float : right; padding : 0% 10% 0% 0%;">Coin : <?php echo $coin;?></span>
<div style="height : 35%;">
  <img src="Images/ディーラー.jpg" alt="ディーラー">
</div>
<div class="Card" style="margin : 0% 44%;">
<img src="Images/card_back.png" alt="裏">
<img src="Images/card_back.png" alt="裏">
</div>
<div class="Card" style="margin : 0% 35%;">
<img src="Images/card_back.png" alt="裏">
<?php

  print "<img src='Images/{$card[5][0]}/{$card[5][1]}.png' alt='{$card[5][0]}の{$card[5][1]}'>";
  print "<img src='Images/{$card[6][0]}/{$card[6][1]}.png' alt='{$card[6][0]}の{$card[6][1]}'>";
  print "<img src='Images/{$card[7][0]}/{$card[7][1]}.png' alt='{$card[7][0]}の{$card[7][1]}'>";

?>
<img src="Images/card_back.png" alt="裏">
</div>
<div class="Card" style="margin : 0% 38%;">
<button type="button" style="margin : 20% 10%" onclick="window.location.href = 'Raise.php';">Raise</button>
<?php

  print "<img src='Images/{$card[0][0]}/{$card[0][1]}.png' alt='{$card[0][0]}の{$card[0][1]}'>";
  print "<img src='Images/{$card[1][0]}/{$card[1][1]}.png' alt='{$card[1][0]}の{$card[1][1]}'>";

?>
<button type="button" style="margin : 20% 10%" onclick="window.location.href = 'Shuffle.php';">Fold</button>
</div>

</body>
</html>
