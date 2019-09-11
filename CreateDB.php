<?php 
define('DB_HOST', 'localhost');
define('DB_NAME', '');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// 文字化け対策
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");

// PHPのエラーを表示するように設定
//error_reporting(E_ALL & ~E_NOTICE);

// データベースの接続
try {
     $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD, $options);
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
     echo $e->getMessage();
     exit;
}
$db -> query("create database Casino default character set utf8;");
$db -> query("use casino;");

$db -> query('set names "utf8";');
$db -> query('set character_set_server = "utf8";');
$db -> query('set character_set_database = "utf8";');

session_start();

?>
