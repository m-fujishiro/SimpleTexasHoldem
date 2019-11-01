<?php 

$user = $_POST["user"];
$pass = password_hash($_POST["pass"], PASSWORD_DEFAULT);
if( !password_verify($_POST["pass2"], $pass) ){

echo <<< EOM
	<script type="text/javascript">
	alert( "パスワードが異なります。" );
	</script>
EOM;
echo '<meta http-equiv="refresh" content="0;URL=Signup.php">';

}
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
//無かったらテーブルを作る(あればエラーが出るが非表示なので問題ない)
$db -> query( "create table casino(ID varchar(10), Password varchar(255), last_login date, running_date int, coin int default 100)CHARACTER SET utf8 COLLATE utf8_general_ci;" );

$db -> query('set names "utf8";');
$db -> query('set character_set_server = "utf8";');
$db -> query('set character_set_database = "utf8";');

$cnt = $db -> query("select count(ID) from casino where ID = '{$user}';");
$cnt = $cnt -> fetch();
if($cnt[0]>0){
	echo <<< EOM
	<script type="text/javascript">
	alert( "そのユーザーはすでに登録されています。" );
	</script>
EOM;
	echo '<meta http-equiv="refresh" content="0;URL=Signup.php">';
}

$sql = "insert into casino values ('{$user}', '{$pass }', (SELECT CURDATE() + 0), 0, 100);";
$db -> query($sql);

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
<link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
<meta http-equiv="refresh" content="5;URL=index.php">

<body>
<div style="width : 20%;">
  <img src="Images/ディーラー.jpg" alt="ディーラー">
</div>
<p><?php echo $user;?>様ですね、かしこまりました。登録中です。少々お待ちください。</p>
</body>




