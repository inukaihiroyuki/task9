<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//1.  DB接続します
include("funcs.php");
$pdo = db_con();

//2. データ登録SQL作成
$lid =$_POST["lid"];
$lpw =$_POST["lpw"];
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE lid=:lid AND lpw=:lpw AND life_flg=0");
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();
// $status にはTrueもしくはFalseが返ってくる

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sqlError($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()

//5. 該当レコードがあればSESSIONに値を代入
if( $val["id"] != "" ){
  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["life_flg"] = $val['life_flg'];
  $_SESSION["bookname"]      = $val['bookname'];
  $_SESSION["bookurl"]      = $val['bookurl'];
  $_SESSION["bookcomment"]      = $val['bookcomment'];
  header("Location: select.php"); //コロンの後は半角スペース要
}else{
  //Login失敗時(Logout経由)
  header("Location: logout.php");
}
exit();
?>

