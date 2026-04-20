<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
//→こちらの方が直接ファイルを開いてもエラー表示にならない

//送信したものを受け取る
$id = $_GET['id'];  //POSTではなく、GETにしたら動いた！！！！！！

//2. DB接続します
include "function.php";
$pdo = db_con();

//３．データ登録SQL作成
//3.UPDATE gs_an_table SET ....; で更新(bindValue)
$sql = "UPDATE wafoo_host_table SET hostPreview=0 WHERE id=:id";
$stmt = $pdo->prepare($sql);//SQLを受け取り準備

//bindValueで危険なスクリプトを判定する
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //成功ならtrue 失敗していたらfalse↓

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:必須項目の入力、半角英数は大丈夫ですか？".$error[2]);
}else{
    //５．index.phpへリダイレクト
    header('Location: ../hostList.php');//処理が終わったらindex.phpにリダイレクトする
    exit;
}
?>
