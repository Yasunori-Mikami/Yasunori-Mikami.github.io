<?php
session_start(); //セッションを使う場合は必ず先頭につける

//1.  DB接続します
include "../../backend/function.php";
$pdo = db_con();

//２．データ登録SQL作成
//A 全てのデータを取得する場合（最新の12件のみ表示）
$stmt = $pdo->prepare("SELECT * FROM wafoo_host_table WHERE hostPreview = 1 order by id desc LIMIT 6");
$status = $stmt->execute();

//     //B  最後に投稿されたデータを表示する場合
// $stmt = $pdo->prepare("SELECT * FROM wafoo_host_table WHERE id =(select max(id) from wafoo_host_table)");
// $status = $stmt->execute();

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
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<a href="#" class="hostlist_box">';
    $view .= '<img src="../../data/img/event_thum.jpg" alt="イベント仮写真" class="hostlist_eventThumbnail">';
    $view .= '<img src="../../data/img/host_thum.jpg" alt="" class="hostlist_pic">';
    $view .= '<h3 class="hostlist_name">'.$result["sei"].$result["mei"].'</h3>';
    $view .= '<p>'.$result["cookGood"].'</p>';
    $view .= '<p>'.$result["station"].'</p>';
    $view .= '</a>';
    }
}
?>
<?php include("../common/headtag.html")?>
<?php include("../common/header.php")?>
<div class="iChatch">
    <!-- <img src="data/img/catch_img.jpg" alt="ホストファミリー" class="iChatch_img"> -->
    <p class="catchText">「食」でもっと気軽に国際体験を</p>
</div>
<main class="hostTop_main">
    <section id="top_about">
        <h2>訪日外国人と一緒に食事を楽しめる<br>民食プラットホーム「WAFOO」 </h2>
        <p class="mainText">WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり、<br>食べりすることで、日本の食文化を楽しむことができるサービスです。</p>
        <p class="mainText mt30">またホストの方は、日本に居ながらにして様々な国から来るゲスト達と英語などで<br>コミュニケーションを取る機会をつくることができます。</p>
        <p class="mainText mt30">日本を訪れる外国人は今や年間約3000万人。<br>彼らが特に楽しみにしているのが、日本の食を楽しむこと。</p>
        <p class="mainText mt30">あなたも「日本食」を通じて、国際体験を気軽に楽しんでみませんか？</p>
    </section>
    <div id="top_merit">
        <img src="../../data/img/host_merit_2.png" alt="ホストとの写真">
        <section class="host_merit_sec">
            <h2>WAFOO を使うメリットって？</h2>
            <p class="host_merit_text">WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり、食べりすることで、日本の食文化を楽しむことができるサービスです。</p>
            <div class="host_merit_option mb30">
                <h3>メリット 1  家に居ながら国際体験ができる</h3>
                <p>WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり、食べりすることで、日本の食文化を楽しむことができるサービスです。</p>
            </div>
            <div class="host_merit_option">
                <h3>メリット 2  家に居ながら国際体験ができる</h3>
                <p>WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり、食べりすることで、日本の食文化を楽しむことができるサービスです。</p>
            </div>
        </section>
    </div>
    <section id="top_plan">
        <h2>3つの体験プラン</h2>
        <p class="mainText">WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり、<br>食べりすることで、日本の食文化を楽しむことができるサービスです。</p>
        <div class="plan_list">
            <div class="plan_box">
                <h3>Cook Plan</h3>
                <img src="../../data/img/catch_img.jpg" alt="">
                <p>WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり、食べりすることで、日本の食文化を楽しむことができるサービスです。</p>
                <div class="host_plan_price">
                    <p>平均価格：¥5,000〜</p>
                    <p>平均時間：2〜3時間</p>
                </div>
            </div>
            <div class="plan_box">
                <h3>Market + Cook Plan</h3>
                <img src="../../data/img/catch_img.jpg" alt="">
                <p>WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり、食べりすることで、日本の食文化を楽しむことができるサービスです。</p>
                <div class="host_plan_price">
                    <p>平均価格：¥7,000〜</p>
                    <p>平均時間：3〜5時間</p>
                </div>
            </div>
            <div class="plan_box">
                <h3>Event Plan</h3>
                <img src="../../data/img/catch_img.jpg" alt="">
                <p>WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり、食べりすることで、日本の食文化を楽しむことができるサービスです。</p>
                <div class="host_plan_price">
                    <p>平均価格：¥9,000〜</p>
                    <p>平均時間：3〜5時間</p>
                </div>
            </div>
        </div>
    </section>
    <section id="top_flow">
        <h2>体験の流れ</h2>
        <p class="mainText">WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり、食べりすることで、日本の食文化を楽しむことができるサービスです。</p>
        <div class="host_flow_box">
            <div class="host_flow_item">
                <h3>1. ユーザー登録</h3>
                <p>WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり</p>
            </div>
            <div class="host_flow_item">
                <h3>2. 体験ページ作成</h3>
                <p>WAFOOは訪日外国人が、日本のローカルな食事をホストと一緒に作ったり</p>
            </div>
            <div class="host_flow_item">
                <h3>3. 体験の提供</h3>
                <p>ゲストからの申込みがあったら、集合場所や時間を調整しましょう。当日は「民食」体験を思いっきり楽しみましょう。</p>
            </div>
            <div class="host_flow_item">
                <h3>4. レビューと振込</h3>
                <p>体験が終わったらゲストとお別れ。その後お互いにレビューが完了したら、インセンティブを振込みます。</p>
            </div>
        </div>
    </section>
    <section id="host_top_experience">
        <h2>どんな体験があるのか見てみよう</h2>
        <div class="host_ex_box">
            <div class="top_host_list"><?=$view?></div>
        </div>
    </section>
    <section id="host_top_qa">
        <h2>よくある質問</h2>
        <div class="host_qa_box">
            <div class="host_qa_item">
                <h3>英語ができなくても大丈夫ですか？</h3>
                <p>体験の内容によっては事業許可証(ビジネスライセンス)が必要な場合があります。必ず地域の法令を確認して、必要な事業許可証について確かめてください。飲食、酒類、移動などが体験に含まれる場合は特に注意が必要です。</p>
            </div>
            <div class="host_qa_item">
                <h3>英語ができなくても大丈夫ですか？</h3>
                <p>体験の内容によっては事業許可証(ビジネスライセンス)が必要な場合があります。</p>
            </div>
            <div class="host_qa_item">
                <h3>英語ができなくても大丈夫ですか？</h3>
                <p>体験の内容によっては事業許可証(ビジネスライセンス)が必要な場合があります。必ず地域の法令を確認して、必要な事業許可証について確かめてください。飲食、酒類、移動などが体験に含まれる場合は特に注意が必要です。</p>
            </div>
            <div class="host_qa_item">
                <h3>英語ができなくても大丈夫ですか？</h3>
                <p>体験の内容によっては事業許可証(ビジネスライセンス)が必要な場合があります。</p>
            </div>
            <div class="host_qa_item">
                <h3>英語ができなくても大丈夫ですか？</h3>
                <p>体験の内容によっては事業許可証(ビジネスライセンス)が必要な場合があります。必ず地域の法令を確認して、必要な事業許可証について確かめてください。</p>
            </div>
        </div>
    </section>
    <div class="host_message_sec">
        <div class="host_message_left">
            <h2>「人との出会い」を通じて国や文化を超え<br>理解し合える世界をつくる</h2>
            <p>- Explore Local Japan With Home Made Food -</p>
        </div>
        <div class="host_message_right">
            <p class="mb30">せっかく旅行をしても、観光スポットを転々とする<br>表面的な観光に終始していませんか？</p>
            <p class="mb30">WAFOOは「食」を通じて旅行者がローカルの人と<br>気軽にコミュニケーションを取れる旅の仕組みをつくります。</p>
            <p class="mb30">ローカルの人と食を共有すれば、旅行は絶対楽しくなるし、相互理解のきっかけにもなると僕らは信じています。</p>
            <p class="mb30">世界中の旅行者に、食を通じたコミュニケーションで、現地のこと、人、文化を深く学べる"最高な"旅行体験を届けます。</p>
            <p></p>
        </div>
    </div>
    <a href="host_form_top.php" id="host_formBtn">ホストに申し込む</a>
    <a href="host_form.php" id="host_formBtn">（旧）ホストに申し込む</a>
</main>
<?php include("../common/footertag.html")?>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../js/script.js"></script>
<script src="../../js/host_top_fade_script.js"></script>
</body>
</html>



