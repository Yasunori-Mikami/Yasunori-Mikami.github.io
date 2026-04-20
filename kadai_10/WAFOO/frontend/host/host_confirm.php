<?php
session_start();

//1.  DB接続します
include "../../backend/function.php";
$pdo = db_con();

//２．データ登録SQL作成
    //A 全てのデータを取得する場合
// $stmt = $pdo->prepare("SELECT * FROM wafoo_host_table");
// $status = $stmt->execute();

    //B  最後に投稿されたデータを表示する場合
$stmt = $pdo->prepare("SELECT * FROM wafoo_host_table WHERE id =(select max(id) from wafoo_host_table)");
$status = $stmt->execute();


//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:".$error[2]);

}else{
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php

    // //--------A 全ての回答を表示する場合---------------
    // while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    // $view .=
    //     '<h2>以下の回答を受付ました！</h2>'
    //     .'<div class="confirm_box">'
    //     .'<table>'
    //         .'<tr><th>名前</th><td class="">'.$result["sei"].$result["mei"].'</td></tr>'
    //         .'<tr><th>メールアドレス</th><td class="">'.$result["mail"].'</td></tr>'
    //         .'<tr><th>性別</th><td class="">'.$result["sex"].'</td></tr>'
    //         .'<tr><th>年齢</th><td class="">'.$result["age"].'</td></tr>'
    //         .'<tr><th>料理歴・経験</th><td class="">'.$result["cookEx"].'</td></tr>'
    //         .'<tr><th>得意料理</th><td class="">'.$result["cookGood"].'</td></tr>'
    //         .'<tr><th>英語以外の言語</th><td class="">'.$result["language"].'</td></tr>'
    //         .'<tr><th>英語でのレッスン</th><td class="">'.$result["english"].'</td></tr>'
    //         .'<tr><th>最寄り駅</th><td class="">'.$result["station"].'</td></tr>'
    //         .'<tr><th>ご自宅でのレッスン</th><td class="">'.$result["homeLesson"].'</td></tr>'
    //         .'<tr><th>受け入れ可能人数</th><td class="">'.$result["guestNum"].'</td></tr>'
    //         .'<tr><th>都合の良い時間帯・曜日</th><td class="">'.$result["confDate"].'</td></tr>'
    //     .'</table>'
    //     .'</div>';
    // }

    //-------B 最後の回答を表示する場合---------------
    if( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .=
        '<div class="confirm_box">'
        .'<table>'
            .'<tr><th>名前</th><td class="">'.$result["sei"].$result["mei"].'</td></tr>'
            .'<tr><th>メールアドレス</th><td class="">'.$result["mail"].'</td></tr>'
            .'<tr><th>性別</th><td class="">'.$result["sex"].'</td></tr>'
            .'<tr><th>年齢</th><td class="">'.$result["age"].'</td></tr>'
            .'<tr><th>料理歴・経験</th><td class="">'.$result["cookEx"].'</td></tr>'
            .'<tr><th>得意料理</th><td class="">'.$result["cookGood"].'</td></tr>'
            .'<tr><th>英語以外の言語</th><td class="">'.$result["language"].'</td></tr>'
            .'<tr><th>英語でのレッスン</th><td class="">'.$result["english"].'</td></tr>'
            .'<tr><th>最寄り駅</th><td class="">'.$result["station"].'</td></tr>'
            .'<tr><th>ご自宅でのレッスン</th><td class="">'.$result["homeLesson"].'</td></tr>'
            .'<tr><th>受け入れ可能人数</th><td class="">'.$result["guestNum"].'</td></tr>'
            .'<tr><th>都合の良い時間帯・曜日</th><td class="">'.$result["confDate"].'</td></tr>'
        .'</table>'
        .'</div>';
    }
}
?>

<?php include("../common/headtag.html")?>
<?php include("../common/header.php")?>
<main>
<div>
    <h2>以下の回答を受付ました！</h2>
    <p class="mainText">ご回答をありがとうございました。1週間以内に詳細な内容をメールにてご案内差し上げます。またゲストのご案内に関しては、多数の応募をいただいているため、3ヶ月ほどご紹介できない場合がございます。予めご了承いただけますと幸いです。</p>
    <div class="container jumbotron"><?=$view?></div>
    <p class="confirm_btn"><a href="../../index.php">TOPに戻る</a></p>
</div>
</main>
<?php include("../common/footertag.html")?>