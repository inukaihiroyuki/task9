<?php
session_start();
$id = $_GET["id"];

include "funcs.php";
// データベースを取得。
logincheck();
$pdo = db_con();

//２．データ登録SQL作成  :idはバインド変数と呼ばれている。
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id"); //指定したidの人のデータだけ引っ張ることができる。
$stmt -> bindvalue(":id", $id, PDO::PARAM_INT); //第三変数を指定することで型を制限でき、セキュリティ向上
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}

if($_SESSION["kanri_flg"]=="1"){
    $readonly = "";
  }else{
    $readonly = " readonly";
}

?>

<!-- index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存） -->

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>本登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>本を登録しよう</legend>
     <label>書籍名：<input type="text" name="bookname" value=" <?=$row["bookname"]?> "<?=$readonly?>></label><br>
     <label>書籍URL：<input type="text" name="bookurl" value=" <?=$row["bookurl"]?> "<?=$readonly?>></label><br>
     <label><textArea name="bookcomment" rows="4" cols="40"<?=$readonly?>><?=$row["bookcomment"]?></textArea></label><br>
      <?php if($_SESSION["kanri_flg"]=="1"){ ?>
        <input type="submit" value="送信">
      <?php }; ?>
     <input type="hidden" name="id" value="<?=$row["id"]?>">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
