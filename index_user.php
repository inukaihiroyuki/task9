<?php
session_start();
include "funcs.php";
logincheck();
$pdo = db_con();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
<?php include("menu.php"); ?>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert_user.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録しよう</legend>
     <label>氏名：<input type="text" name="name"></label><br>
     <label>ID：<input type="lid" name="lid"></label><br>
     <label>PW：<input type="lpw" name="lpw"></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
