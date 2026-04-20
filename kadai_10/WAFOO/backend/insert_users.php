<?php
//最初にSESSIONを開始！！
session_start();

//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
//→こちらの方が直接ファイルを開いてもエラー表示にならない

//送信したものを受け取る
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$nationality = $_POST['nationality'];
$gender = $_POST['gender'];
$birth_month = $_POST['birth_month'];
$birth_day = $_POST['birth_day'];
$birth_year = $_POST['birth_year'];
$email = $_POST['email'];
$password = $_POST['password'];

//2. DB接続します
include "function.php";
$pdo = db_con();

// try {
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root',''); //さくらの設定時はここで設定する、ID名、パスワード（MAMPの場合はroot、XAMPの場合は空欄でOK）
// } catch (PDOException $e) { //接続できなかったら
//   exit('DB_CONECTION_ERROR:'.$e->getMessage());
// }


//３．データ登録SQL作成
$sql = "INSERT INTO users(first_name,last_name,nationality,gender,birth_month,birth_day,birth_year,email,password,created)VALUES(:first_name,:last_name,:nationality,:gender,:birth_month,:birth_day,:birth_year,:email,:password,sysdate())";//SQL文を代入 ここに変数を直接入れるとセキュリティ的に良くない。→bindValueを通す！(:変数名)で一回入れて、それを変数に渡す↓↓

$stmt = $pdo->prepare($sql);//SQLを受け取り準備

//bindValueで危険なスクリプトを判定する
$stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)  STRは文字、INTは数字
$stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
$stmt->bindValue(':nationality', $nationality, PDO::PARAM_STR);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':birth_month', $birth_month, PDO::PARAM_INT);
$stmt->bindValue(':birth_day', $birth_day, PDO::PARAM_STR);
$stmt->bindValue(':birth_year', $birth_year, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

$status = $stmt->execute(); //成功ならtrue 失敗していたらfalse↓


//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:全て必須項目です！半角英数は大丈夫ですか？".$error[2]);
}else{
    //５．index.phpへリダイレクト
    //処理が終わったらindex.phpにリダイレクトする
    // header('Location: ../index.php');

    //元のページに戻る
    // $uri = $_SERVER['HTTP_REFERER'];
    // header("Location: ".$uri, true, 303);



    //----Sign inと同時にログインする仕様↓---------------
    //6. ログイン用のデータ登録SQL作成
    $sql_login = "SELECT * FROM users WHERE email=:email AND password=:password"; //パスワードとIDが一致、かつ退会してない人
    $stmt_login = $pdo->prepare($sql_login);
    $stmt_login->bindValue(':email', $_POST["email"],PDO::PARAM_STR);
    $stmt_login->bindValue(':password', $_POST["password"],PDO::PARAM_STR);
    $res = $stmt_login->execute();

    //7. 抽出データ数を取得
    $val = $stmt_login->fetch(); //1レコードだけ取得する方法

    //8. 該当レコードがあればSESSIONに値を代入
    if( $val["user_id"] != "" ){ //idが0(数値ない)では無ければ→誰かいる
        $_SESSION["chk_ssid"]  = session_id();  //別のキーをもたせておく OKであれば値をもたせる→IDがあればログインしているといえる
        $_SESSION["user_id"]  = $val["user_id"];
        $_SESSION["last_name"]      = $val['last_name']; //セッションに代入しておけば、いちいちSQLを入れなくてもセッションから引っ張れる
        header('Location: ../frontend/mypage/mypage.php');
    }else{
        //logout処理を経由して全画面へ
        header('Location: ../frontend/mypage/login.php');
    }
    exit;
}
?>