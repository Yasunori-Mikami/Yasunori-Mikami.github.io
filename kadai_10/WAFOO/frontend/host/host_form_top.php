<?php
session_start();
include "../../backend/function.php";
chkSsid(); //ログインしないと見れない仕様に
$pdo = db_con();
?>
<?php include("../common/headtag.html")?>
<?php include("../common/header.php")?>
<div class="host_form_icatch">
    <h2>Cooking and Dining experience</h2>
</div>
<main>
    <div class="host_form_explain">
        <p>WAFOOの体験ホストにご興味をお持ちいただきありがとうございます。<br>体験ページを作り始める前にまずは簡単な質問から。</p>
        <p>企画作成後は、体験内容をWAFOOの担当者が確認します。体験基準を満たしていれば、そのまま日時を追加してホスティングを開始できます。</p>
    </div>
    <div class="host_form_needs">
        <h3>体験を実施するにあたり必要なことは?</h3>
        <ul>
            <li>・企画する体験内容の知識と熱意があること</li>
            <li>・場所の案内や見る、行くだけではなく双方の対話や行動をとおして深く体験できること</li>
            <li>・ゲストが特別な場所やコミュニティにアクセスできること</li>
            <li>・ホストのユニークな視点が表れていること</li>
        </ul>
    </div>
    <a href="host_form_qa.php" class="host_form_nextbtn">続ける</a>
</main>
<?php include("../common/footertag.html")?>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../js/script.js"></script>
</body>
</html>