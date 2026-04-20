<?php
//最初にSESSIONを開始！！
session_start();

//0.外部ファイル読み込み
include("function.php");

//1.  DB接続しますå
$pdo = db_con();

//2. データ登録SQL作成
$sql = "SELECT * FROM users WHERE email=:email AND password=:password"; //パスワードとIDが一致、かつ退会してない人
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $_POST["email"],PDO::PARAM_STR);
$stmt->bindValue(':password', $_POST["password"],PDO::PARAM_STR);
$res = $stmt->execute();

//3. SQL実行時にエラーがある場合
if($res==false){
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

//4. 抽出データ数を取得
$val = $stmt->fetch(); //1レコードだけ取得する方法

//5. 該当レコードがあればSESSIONに値を代入
if( $val["user_id"] != "" ){ //idが0(数値ない)では無ければ→誰かいる
    $_SESSION["chk_ssid"]  = session_id();  //別のキーをもたせておく OKであれば値をもたせる→IDがあればログインしているといえる
    $_SESSION["user_id"]  = $val["user_id"];
    $_SESSION["last_name"]      = $val['last_name']; //セッションに代入しておけば、いちいちSQLを入れなくてもセッションから引っ張れる

    // $uri = $_SERVER['HTTP_REFERER'];
    // header("Location: ".$uri, true, 303);
    header('Location: ../index.php');
}else{
    //logout処理を経由して全画面へ
    header('Location: ../frontend/mypage/login.php');
}

exit();
?>

