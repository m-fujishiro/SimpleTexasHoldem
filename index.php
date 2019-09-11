<?php
include("CreateDB.php");
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
</style>

<body>
<div style="width : 20%;">
  <img src="Images/ディーラー.jpg" alt="ディーラー">
</div>
ようこそいらっしゃいました。
<form action="Login.php" method="post">
<input type="submit" value="ログイン"><input type="button" value="ユーザー登録" onclick="location.href='Signup.php'">
</body>

