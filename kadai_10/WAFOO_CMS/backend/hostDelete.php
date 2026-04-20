<?php
//inset.phpとほとんど同じ！
//1.
$id = $_GET["id"]; // 新規：POSTではなく、GETに変更する

//2. DB接続します
include "function.php";
$pdo = db_con();

//３．データ登録SQL作成
//3.基本的にinsert.phpの処理の流れです。
$sql = "DELETE FROM wafoo_host_table WHERE id=:id";   //SQL文の変更 DELETE文
$stmt = $pdo->prepare($sql);

//IDの項目のみでOK
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: ../hostList.php");
    exit;
}