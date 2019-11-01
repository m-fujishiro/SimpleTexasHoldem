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

<body>
<div style="width : 20%;">
  <img src="Images/ディーラー.jpg" alt="ディーラー">
</div>
<p>ご新規様ですね。当店は会員制となっております。</p>
<form action="UserSave.php" method="post">
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;お名前<input type="text" name="user" required><br>
&emsp;&emsp;&emsp;&emsp;パスワード<input type="password" name="pass" required><br>
パスワード(再入力)<input type="password" name="pass2" required><br>
<input type="submit" value="ユーザー登録"><input type="reset" value="リセット">
</body>

