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
<p>お客様の呼び名と、合言葉をお教えください。</p>
<form action="UserLoad.php" method="post">
<p>呼び名<input type="text" name="user" required><br />
合言葉<input type="password" name="pass" required></p>
<input type="submit" value="ログイン"><input type="reset" value="リセット">
</body>
</html>
