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
<p>ようこそいらっしゃいました。</p>
<form action="Login.php" method="post">
<input type="submit" value="ログイン"><input type="button" value="ユーザー登録" onclick="location.href='Signup.php'">
</body>

