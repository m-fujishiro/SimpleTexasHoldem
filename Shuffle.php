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
p {
  text-shadow: 1px 1px 0 rgba(0,0,0,.2);
  font-style: italic;
}
</style>
<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
<body>
<div style="width : 20%;">
  <img src="Images/ディーラー.jpg" alt="ディーラー">
</div>
<p>カードのシャッフルをしています。5秒ほどお待ちください。</p>
</body>

