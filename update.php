<?php
$bookname = $_POST["bookname"];
$bookurl = $_POST["bookurl"];
$bookcomment = $_POST["bookcomment"];
$id = $_POST["id"];

//2. DB接続します
include "funcs.php";
$pdo = db_con();

//３．データ登録SQL作成
// UPDATE分
$sql = "UPDATE gs_bm_table SET bookname=:bookname ,bookurl=:bookurl ,bookcomment=:bookcomment WHERE id=:id;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookcomment', $bookcomment, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    redirect("select.php");
}

?>
