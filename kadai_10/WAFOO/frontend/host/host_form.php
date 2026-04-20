<?php
session_start();
include "../../backend/function.php";
chkSsid(); //ログインしないと見れない仕様に
$pdo = db_con();
?>
<?php include("../common/headtag.html")?>
<?php include("../common/header.php")?>

<!-- 画像アップロード処理
<?php
    $tempfile = $_FILES['prof_file']['tmp_name']; // 一時ファイル名
    $filename = '../../data/img'.$_FILES['prof_file']['name']; // 本来のファイル名

    if (is_uploaded_file($tempfile)) {
        if ( move_uploaded_file($tempfile , $filename )) {
        echo $filename . "をアップロードしました。";
        } else {
            echo "ファイルをアップロードできません。";
        }
    } else {
        echo "ファイルが選択されていません。";
    }
?> -->


<main>
    <!-- <form action="post_confirm.php" method="post"> -->
    <h2>ホスト募集アンケート</h2>
    <p>ホスト募集にあたり下記の項目を記入の上、送信してください。回答時間は約2分です。</p>
    <form action="../../backend/insert_host.php" method="post" id="host_form" enctype="multipart/form-data">
        <section class="host_form_section">
            <h3>STEP1  基本情報の入力</h3>
            <table>
                <tr>
                    <th>お名前<span class="form_must">必須</span></th>
                    <td>
                        <span class="form_comment">姓：</span><input type="text" name="sei" size="25">
                        <span class="form_comment ml15">名：<input type="text" name="mei" size="25"></span>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス<span class="form_must">必須</span></th>
                    <td><input type="text" name="mail" size="75"></td>
                </tr>
                <tr>
                    <th>性別<span class="form_must">必須</span></th>
                    <td>
                        <input type="radio" name="sex" value="男性"><span class="form_comment mr15">男性</span>
                        <input type="radio" name="sex" value="女性"><span class="form_comment mr15">女性</span>
                        <input type="radio" name="sex" value="どちらでもない"><span class="form_comment mr15">どちらでもない</span>
                    </td>
                </tr>
                <tr>
                    <th>年齢<span class="form_must">必須</span></th>
                    <td>
                        <input type="text" name="age">
                        <span class="form_comment">（半角英数）</span>
                    </td>
                </tr>
                <tr>
                    <th>プロフィール画像<span class="form_must">必須</span></th>
                    <td>
                        <input type="file" name="prof_file">
                    </td>
                </tr>
            </table>
        </section>
        <section class="host_form_section">
            <h3>STEP2  料理経験について</h3>
            <table>
                <tr>
                    <th>料理歴・経験<span class="form_want">任意</span></th>
                    <td>
                        <textarea name="cookEx" rows="5" cols="75"></textarea>
                        <br>
                        <span class="form_comment">（特にない方は普段の料理頻度をご記入ください）</span>
                    </td>
                </tr>
                <tr>
                    <th>得意料理は？<span class="form_want">任意</span></th>
                    <td>
                        <textarea name="cookGood" rows="5" cols="75"></textarea>
                </tr>
            </table>
        </section>
        <section class="host_form_section">
            <h3>STEP3  受け入れ体制について</h3>
            <table>
                <tr>
                    <th>話せる言語<span class="form_must">必須</span></th>
                    <td>
                        <input type="text" name="language" size="75">
                        <span class="form_comment">
                        <br>（日本語以外）</span>
                    </td>
                </tr>
                <tr>
                    <th>英語でのレッスン<span class="form_must">必須</span></th>
                    <td>
                        <input type="radio" name="english" value="可能"><span class="form_comment mr15">できる</span>
                        <input type="radio" name="english" value="不可能"><span class="form_comment mr15">できない</span>
                    </td>
                </tr>
                <tr>
                    <th>自宅からの最寄り駅<span class="form_must">必須</span></th>
                    <td><input type="text" name="station" size="75"></td>
                </tr>
                <tr>
                    <th>ご自宅でのレッスン<span class="form_must">必須</span></th>
                    <td>
                        <input type="radio" name="homeLesson" value="可能"><span class="form_comment mr15">できる</span>
                        <input type="radio" name="homeLesson" value="不可能"><span class="form_comment mr15">できない</span>
                    </td>
                </tr>
                <tr>
                    <th>ゲスト人数<span class="form_must">必須</span></th>
                    <td>
                        <input type="text" name="guestNum">
                        <span class="form_comment">名 （半角英数）
                        <br>ご自宅でレッスンができる方は、何名までゲストをお迎えできますか？</span>
                    </td>
                </tr>
                <tr>
                    <th>都合の良い時間帯・曜日<span class="form_must">必須</span></th>
                    <td>
                        <textarea name="confDate" rows="5" cols="75"></textarea>
                        <br>
                        <span class="form_comment">（受け入れできる日時や期間などあれば記入してください。）</span>
                    </td>
                </tr>
            </table>
        </section>
        <p class="submitBtn"><input type="submit" value="回答する"></p>
    </form>
</main>
<?php include("../common/footertag.html")?>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../js/script.js"></script>
</body>
</html>