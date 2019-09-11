<?php 
include("load_hoge.php");
$db -> query("use casino;");
$coin = $db -> query("select coin from casino where id = '{$user}';");
$coin = $coin -> fetch()[0];

?>
