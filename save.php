<?php 

$db -> query("use casino;");
$sql = "update casino set coin={$coin} where ID = '{$user}';";
$db -> query($sql);

?>
