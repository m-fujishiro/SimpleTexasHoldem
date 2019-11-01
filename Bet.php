<html>

<head>
<title>Casino</title>
<meta http-equiv="Content-Style-Type" content="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
<?php include("CreateDB.php");?>
<?php include("load.php");?>
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
  height : auto;
  width: 100%;
  text-align : center;
}
p {
  text-shadow: 1px 1px 0 rgba(0,0,0,.2);
  font-style: italic;
}

--> 
</style>
</head>
<body>

<form action = "main.php" method = "post" onsubmit="shuffle_count()">
<script>
var start = new Date();
</script>
<div style="width : 20%;">
  <img src="Images/ディーラー.jpg" alt="ディーラー">
</div>
<div><p>いくらベットなさいますか？(Max : <?php echo $coin;?>)<p></div>
</body>
<input type="hidden" name="shuffle_num" value="">
<input type="hidden" name="user" value="<?php echo $user;?>">
<input type="number" name="bet" max="<?php echo $coin;?>" min="10" list="BET" required>
<?php $_SESSION["bet"] = true;?>
<input type="submit" value="送信">
<datalist id="BET">
<option value="10">
<option value="30">
<option value="50">
<option value="100">
<option value="<?php echo ($coin > 100) ? $coin : $coin*2;?>">
</datalist>
</form>

<script>
function shuffle_count(){
  var stop = new Date();
  document.forms[0].shuffle_num.value = (stop.getTime() - start.getTime()) / 1000 + 5;
}
</script>
