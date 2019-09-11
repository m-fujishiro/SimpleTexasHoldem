<?php 

$db -> query("use casino;");
$db -> query("drop table card;");
$db -> query("drop table bet;");
$db -> query("create table card(id int AUTO_INCREMENT PRIMARY KEY not null, mark varchar(15), num int)CHARACTER SET utf8 COLLATE utf8_general_ci;");

/*/
for($i=0; $i<count($card); $i++)
 $db -> query("insert into card(mark, num) values('{$card[$i][0]}', {$card[$i][1]});");
//*/

$_SESSION["card"] = $card;

$db -> query("create table bet(bet int, raise int default false) CHARACTER SET utf8 COLLATE utf8_general_ci;");
$db -> query("insert into bet values({$bet}, {$raise});");

$db -> query("create table hoge (now_user varchar(10));");
$db -> query("insert into hoge values({$user});");


?>
