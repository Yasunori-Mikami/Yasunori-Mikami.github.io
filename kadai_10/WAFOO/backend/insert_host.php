<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
//→こちらの方が直接ファイルを開いてもエラー表示にならない

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

//2. DB接続します
include "function.php";
$pdo = db_con();

// try {
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root',''); //さくらの設定時はここで設定する、ID名、パスワード（MAMPの場合はroot、XAMPの場合は空欄でOK）
// } catch (PDOException $e) { //接続できなかったら
//   exit('DB_CONECTION_ERROR:'.$e->getMessage());
// }


//３．データ登録SQL作成
$sql = "INSERT INTO wafoo_host_table(sei,mei,mail,sex,age,cookEx,cookGood,language,english,station,homeLesson,guestNum,confDate,indate)VALUES(:sei,:mei,:mail,:sex,:age,:cookEx,:cookGood,:language,:english,:station,:homeLesson,:guestNum,:confDate,sysdate())";//SQL文を代入 ここに変数を直接入れるとセキュリティ的に良くない。→bindValueを通す！(:変数名)で一回入れて、それを変数に渡す↓↓

$stmt = $pdo->prepare($sql);//SQLを受け取り準備

//bindValueで危険なスクリプトを判定する
$stmt->bindValue(':sei', $sei, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  STRは文字、INTは数字
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

$status = $stmt->execute(); //成功ならtrue 失敗していたらfalse↓


//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:必須項目の入力、半角英数は大丈夫ですか？".$error[2]);
}else{
    //５．index.phpへリダイレクト
    header('Location: ../frontend/host/host_confirm.php');//処理が終わったらindex.phpにリダイレクトする
    exit;
}
?>
