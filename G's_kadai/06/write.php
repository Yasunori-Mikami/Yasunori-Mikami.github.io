<?php include("frontend/headtag.html")?>
<?php include("frontend/header.php")?>
<main>
回答ありがとうございました。<br>
回答内容はdata.txtのファイルに書き込みます。
<br>
<div><a href="post_form.php">フォーム戻る</a></div>
<div><a href="index.php">TOPに戻る</a></div>
</main>
<?php
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $sex = $_POST["sex"];
    $age = $_POST["age"];
    $cm = ",";
    $str = $name.$cm.$mail.$cm.$sex.$cm.$age;

//文字作成
// $str = date("Y-m-d H:i:s");
//File書き込み
$file = fopen("data/data.txt","a");	// ファイル読み込み メモ帳の作成
fwrite($file, $str."\n");//\(バックスラッシュ)：メモ帳などで改行する意味
fclose($file);
?>
<?php include("frontend/footertag.html")?>