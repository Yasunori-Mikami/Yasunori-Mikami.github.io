<?php include("frontend/headtag.html")?>
<?php include("frontend/header.php")?>
<main>
    <!-- <form action="post_confirm.php" method="post"> -->
    <form action="write.php" method="post">
        名前: <input type="text" name="name">
        メールアドレス: <input type="text" name="mail">
        性別: <input type="text" name="sex">
        年齢: <input type="text" name="age">
    <input type="submit" value="送信">
    </form>
    <div><a href="index.php">TOPに戻る</a></div>
</main>
<?php include("frontend/footertag.html")?>