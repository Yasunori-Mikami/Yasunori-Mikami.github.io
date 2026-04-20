<?php
$id = $_GET["id"];

//1.  DB接続
include "backend/function.php";
$pdo = db_con();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM wafoo_host_table WHERE id=:id");

$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    $row = $stmt->fetch();  //これだけでOK! fetchで1行だけ取ってくる！
}
?>

<?php include("frontend/headtag.html")?>
<?php include("frontend/header.php")?>
<main>
    <?php include("frontend/sidebar.php")?>
    <div class="mainContents">
        <h2>Host - Detail: ID=<?=$row["id"]?></h2>
        <p><?php if($row["hostPreview"] == "0"){
                echo "ステータス：下書き";}?>
        </p>
        <form action="backend/update_host.php" method="post" id="host_form" enctype="multipart/form-data">
        <section class="hostDetail_section">
            <h3>基本情報</h3>
            <table>
                <tr>
                    <th>名前<span class="form_must">必須</span></th>
                    <td>
                        <span class="form_comment">姓：</span><input type="text" name="sei" size="25"  value="<?=$row['sei']?>">
                        <span class="form_comment ml15">名：<input type="text" name="mei" size="25" value="<?=$row['mei']?>"></span>
                    </td>
                </tr>
                <tr>
                    <th>メールアドレス<span class="form_must">必須</span></th>
                    <td><input type="text" name="mail" size="75" value="<?=$row['mail']?>"></td>
                </tr>
                <tr>
                    <th>性別<span class="form_must">必須</span></th>
                    <td>
                        <input type="radio" name="sex" value="男性">
                        <span class="form_comment mr15">男性</span>
                        <input type="radio" name="sex" value="女性">
                        <span class="form_comment mr15">女性</span>
                        <input type="radio" name="sex" value="どちらでもない">
                        <span class="form_comment mr15">どちらでもない</span>
                    </td>
                </tr>
                <tr>
                    <th>年齢<span class="form_must">必須</span></th>
                    <td>
                        <input type="text" name="age" value="<?=$row['age']?>">
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
        <section class="hostDetail_section">
            <h3>料理経験</h3>
            <table>
                <tr>
                    <th>料理歴・経験<span class="form_want">任意</span></th>
                    <td>
                        <textarea name="cookEx" rows="5" cols="75"><?=$row['cookEx']?></textarea>
                        <br>
                        <span class="form_comment">（特にない方は普段の料理頻度をご記入ください）</span>
                    </td>
                </tr>
                <tr>
                    <th>得意料理は？<span class="form_want">任意</span></th>
                    <td>
                        <textarea name="cookGood" rows="5" cols="75"><?=$row['cookGood']?></textarea>
                </tr>
            </table>
        </section>
        <section class="hostDetail_section">
            <h3>受け入れ体制</h3>
            <table>
                <tr>
                    <th>話せる言語<span class="form_must">必須</span></th>
                    <td>
                        <input type="text" name="language" size="75" value="<?=$row['language']?>">
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
                    <td><input type="text" name="station" size="75" value="<?=$row['station']?>"></td>
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
                        <input type="text" name="guestNum" value="<?=$row['guestNum']?>">
                        <span class="form_comment">名 （半角英数）
                        <br>ご自宅でレッスンができる方は、何名までゲストをお迎えできますか？</span>
                    </td>
                </tr>
                <tr>
                    <th>都合の良い時間帯・曜日<span class="form_must">必須</span></th>
                    <td>
                        <textarea name="confDate" rows="5" cols="75"><?=$row['confDate']?></textarea>
                        <br>
                        <span class="form_comment">（受け入れできる日時や期間などあれば記入してください。）</span>
                    </td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?=$row['id']?>">
                     <!-- これがないと動かない！！ どのidの情報を更新しないと行けないのか、明示する必要がある！-->
                </tr>
            </table>
        </section>
        <div class="editBtn">
            <input type="submit" value="編集する">
            <span id="hostDelete_btn">削除する</span>
            <a href="backend/hostPreview.php?id=<?=$row['id']?>" id="hostPreview_btn">下書きにする</a>
        </div>
    </form>
    </div>
    <div class="mordal_section">
        <div class="secondAnswer_box">
            <p class="title">本当にこのホストを削除しますか？?</p>
            <a href="backend/hostDelete.php?id=<?=$row['id']?>">はい</a>
            <a href="" class="ml15" id="mordalCansel_btn">キャンセル</a>
        </div>
    </div>
</main>
<?php include("frontend/footertag.html")?>