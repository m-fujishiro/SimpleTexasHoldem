<html>
<head>
<title>Casino</title>
</head>
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
<form action="UserLoad.php" method="post">
ユーザー名<input type="text" name="user" required><br>
パスワード<input type="password" name="pass" required><br>
<input type="submit" value="ログイン"><input type="reset" value="リセット">
</body>
</html>
