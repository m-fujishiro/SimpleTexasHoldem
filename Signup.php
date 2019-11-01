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
<p>ご新規様ですね。当店は会員制となっております。</br>
呼び名と合言葉をご入力ください。</p>
<form action="UserSave.php" method="post">
<p>&emsp;&emsp;&emsp;&emsp;呼び名<input type="text" name="user" required><br>
&emsp;&emsp;&emsp;&emsp;合言葉<input type="password" name="pass" required><br>
合言葉(再入力)<input type="password" name="pass2" required></p>
<input type="submit" value="ユーザー登録"><input type="reset" value="リセット">
</body>

