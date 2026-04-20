<?php
//inset.phpとほとんど同じ！
//1. POSTデータ取得
//送信したものを受け取る
$sei = $_POST['sei'];
$mei = $_POST['mei'];
$mail = $_POST['mail'];
$sex = $_POST['sex'];
$age = $_POST['age'];
$cookEx = $_POST['cookEx'];
$cookGood = $_POST['cookGood'];
$language = $_POST['language'];
$english = $_POST['english'];
$station = $_POST['station'];
$homeLesson = $_POST['homeLesson'];
$guestNum = $_POST['guestNum'];
$confDate = $_POST['confDate'];

$id = $_POST["id"]; //新規追加！！！！！！

//2. DB接続します
include "function.php";
$pdo = db_con();

//３．データ登録SQL作成
//3.UPDATE gs_an_table SET ....; で更新(bindValue)
$sql = "UPDATE wafoo_host_table SET sei=:sei,mei=:mei,mail=:mail,sex=:sex,age=:age,cookEx=:cookEx,cookGood=:cookGood,language=:language,english=:english,station=:station,homeLesson=:homeLesson,guestNum=:guestNum,confDate=:confDate WHERE id=:id";
//★★ WHERE でID指定
//→bindValueを通す！(:変数名)で一回入れて、それを変数に渡す↓↓

$stmt = $pdo->prepare($sql);//SQLを受け取り準備

//bindValueで危険なスクリプトを判定する
$stmt->bindValue(':sei', $sei, PDO::PARAM_STR);
$stmt->bindValue(':mei', $mei, PDO::PARAM_STR);
$stmt->bindValue(':mail', $mail, PDO::PARAM_STR);
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':cookEx', $cookEx, PDO::PARAM_STR);
$stmt->bindValue(':cookGood', $cookGood, PDO::PARAM_STR);
$stmt->bindValue(':language', $language, PDO::PARAM_STR);
$stmt->bindValue(':english', $english, PDO::PARAM_STR);
$stmt->bindValue(':station', $station, PDO::PARAM_STR);
$stmt->bindValue(':homeLesson', $homeLesson, PDO::PARAM_STR);
$stmt->bindValue(':guestNum', $guestNum, PDO::PARAM_STR);
$stmt->bindValue(':confDate', $confDate, PDO::PARAM_STR);

//★★★★★★★★IDの項目を追加★★★★★★★★★★★★
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
