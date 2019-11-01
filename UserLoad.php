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
$db -> query("use casino;");

$db -> query('set names "utf8";');
$db -> query('set character_set_server = "utf8";');
$db -> query('set character_set_database = "utf8";');

$user = $_POST["user"];
$pass = $_POST["pass"];

$sql = "select Password from casino where ID='{$user}';";
$pass2 = $db -> query($sql);
$pass2 = $pass2 -> fetch()[0];
if( !password_verify($pass, $pass2) ){
	echo <<< EOM
	<script type="text/javascript">
	alert( "パスワードが異なります。" );
	</script>
EOM;
	echo '<meta http-equiv="refresh" content="0;URL=index.php">';
}


$cnt = $db -> query("select datediff(curdate(), last_login) from casino where ID = '{$user}';");
$cnt = $cnt -> fetch()[0];
if($cnt > 0){
	if($cnt == 1) $db -> query("update casino set running_date = running_date + 1;");
	else $db -> query("update casino set running_date = 0;");
	$db -> query("update casino set coin = coin + 100 + running_date * 10;");
	$db -> query("update casino set last_login = curdate();");
}

$db -> query("drop table hoge;");
$db -> query("create table hoge(now_user varchar(10))CHARACTER SET utf8 COLLATE utf8_general_ci;");
$db -> query("insert into hoge values('{$user}');");

?>

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

<meta http-equiv="refresh" content="5;URL=Shuffle.php">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
<body>
<div style="width : 20%;">
  <img src="Images/ディーラー.jpg" alt="ディーラー">
</div>
<?php echo "はい。{$user}様ですね。\n";?>
それでは、ごゆるりとお楽しみください。
</body>




