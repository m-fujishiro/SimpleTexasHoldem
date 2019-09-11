<?php
include("CreateDB.php");
include("load.php");
?>


<?php

if($coin < 10){
	echo <<< EOM
	<script>
	var hoge = alert("コインがなくなりました。体験版のため、コインを回復します。");
	</script>
	
EOM;

$db -> query("update casino set coin=100 where ID='{$user}';");

} else if ($coin > 10000) {
	echo <<< EOM
	<script>
	alert("おめでとうございます。10000コインを超えました。<?php echo PHP_INT_MAX; ?>コイン以上の挙動はサポートしておりませんのでご了承ください。");
	</script>

EOM;

}

?>


<meta http-equiv="refresh" content="5;URL=Bet.php">
<style>
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
  height : auto;
  width: 100%;
  text-align : center;
}
</style>

<body>
<div style="width : 20%;">
  <img src="Images/ディーラー.jpg" alt="ディーラー">
</div>
カードのシャッフルをしています。5秒ほどお待ちください。
</body>

