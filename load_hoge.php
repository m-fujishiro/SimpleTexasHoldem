<?php 

$db -> query("use casino;");
$bet = $db -> query("select bet from bet;");
$bet = $bet ? $bet -> fetch()[0] : 0;
$raise = $db -> query("select raise from bet;");
$raise = $raise ? $raise -> fetch()[0] : 0;
$user = $db -> query("select now_user from hoge;");
$user = $user -> fetch()[0];

if(isset($_SESSION["card"]))
for($i=1; $i<53; $i++){
  $card = $_SESSION["card"];
}
?>
