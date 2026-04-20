<?php
session_start();
include "../../backend/function.php";
chkSsid(); //ログインしないと見れない仕様に
$pdo = db_con();
?>
<?php include("../common/headtag.html")?>
<?php include("../common/header.php")?>
<div class="host_form_icatch host_form_icatch_qa ">
    <h2 class="tal">STEP 1　開催場所の入力</h2>
    <p class="host_qa_percentage">33%</p>
</div>
<main>
    <form action="../../backend/・・・・・・.php" method="post" class="host_form_box" enctype="multipart/form-data">
        <div class="host_form_sidebar">
            <ul class="host_form_tab">
                <li class="select">STEP 1 　開催場所</li>
                <li>STEP 2 　あなたについて</li>
                <li>STEP 3 　イベント概要</li>
                <li>STEP 4 　イベント詳細</li>
                <li>STEP 5 　写真選択</li>
                <li>STEP 6 　日付と選択</li>
                <li>STEP 7 　その他設定</li>
            </ul>
            <ul class="host_form_submenu">
                <li class="mb15"><a href="">サンプルを見る ＞</a></li>
                <li><a href="">プレビューを見る ＞</a></li>
            </ul>
        </div>
        <div class="host_form_content">
            <ul>
                <!-- STEP1 -->
                <li>
                    <section class="host_form_qa_item">
                        <h3>【1-1】開催場所は自宅ですか？イベント会場やシェアキッチなどをレンタルする予定ですか？</h3>
                        <div class="host_form_select cp_sl">
                            <select name="location_frag" required>
                                <option value='' disabled selected style='display:none;'>選択して下さい</option>
                                <option value="1">自宅</option>
                                <option value="2">シェアキッチン</option>
                                <option value="3">イベント会場</option>
                            </select>
                        </div>
                        <p class="small_comment">※ 食事を一緒につくる場合、平均3時間ほどです。</p>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【1-2】開催場所の都道府県を選択して下さい。</h3>
                        <div class="host_form_select cp_sl">
                            <select name="prefecture" required>
                                <option value='' disabled selected style='display:none;'>選択して下さい</option>
                                <option value="1">東京都</option>
                                <option value="2">神奈川県</option>
                                <option value="3">埼玉県</option>
                            </select>
                        </div>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【1-3】開催場所の市、または区を選択して下さい。</h3>
                        <div class="host_form_select cp_sl">
                            <select name="city">
                                <option value='' disabled selected style='display:none;'>選択して下さい</option>
                                <option value="1">新宿区</option>
                                <option value="2">渋谷区</option>
                                <option value="3">品川区</option>
                            </select>
                        </div>
                    </section>
                    <p>続けるyoyoyooyo</p>
                </li>
                <!-- STEP2 -->
                <li class="hide">
                    <section class="host_form_qa_item">
                        <h3>【2-1】イベント当日対応できる言語は何ですか？</h3>
                        <div class="mt15 tac">
                            <label class="host_form_checkbox">
                                <input type="checkbox" name="language" class="check-input" value="日本語" checked>
                                <span class="check-parts">日本語</span>
                            </label>
                            <label class="host_form_checkbox">
                                <input type="checkbox" name="language" class="check-input" value="英語">
                                <span class="check-parts">英語</span>
                            </label>
                            <label class="host_form_checkbox">
                                <input type="checkbox" name="language" class="check-input" value="フランス語">
                                <span class="check-parts">フランス語</span>
                            </label>
                            <label class="host_form_checkbox">
                                <input type="checkbox" name="language" class="check-input" value="スペイン語">
                                <span class="check-parts">スペイン語</span>
                            </label>
                            <label class="host_form_checkbox">
                                <input type="checkbox" name="language" class="check-input" value="中国語">
                                <span class="check-parts">中国語</span>
                            </label>
                            <label class="host_form_checkbox">
                                <input type="checkbox" name="language" class="check-input" value="韓国語">
                                <span class="check-parts">韓国語</span>
                            </label>
                        </div>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【2-2】イベントページに記載するあなたの紹介文を記載して下さい。</h3>
                        <p class="small_comment">300文字程度が目安です。<br>あなたが掲載しようとしている体験を関係する内容を書くといいでしょう。</p>
                        <p class="mt15">
                            <textarea name="host_explain" cols="100" rows="30" class="txtarea"></textarea>
                            <p>2322文字</p>
                        </p>
                    </section>
                    <p>続けるyoyoyooyo</p>
                </li>
                <!-- STEP3 -->
                <li class="hide">
                    <section class="host_form_qa_item">
                        <h3>【3-1】イベントのカテゴリを選んで下さい。</h3>
                        <div class="host_form_select cp_sl">
                            <select name="category" required>
                                <option value='' disabled selected style='display:none;'>選択して下さい</option>
                                <option value="plan1">プラン1（料理）</option>
                                <option value="plan2">プラン2（マーケット+料理）</option>
                                <option value="plan3">プラン3（シェアキッチン / イベント）</option>
                            </select>
                        </div>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【3-2】体験でつくる食事内容を選んで下さい。</h3>
                        <div class="host_form_select cp_sl">
                            <select name="food_tag" required>
                                <option value='' disabled selected style='display:none;'>選択して下さい</option>
                                <option value="1">ラーメン</option>
                                <option value="2">寿司</option>
                                <option value="3">たこ焼き</option>
                            </select>
                        </div>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【3-3】トータルで体験に要する時間を選んで下さい。</h3>
                        <div class="host_form_select cp_sl">
                            <select name="location_frag" required>
                                <option value='' disabled selected style='display:none;'>選択して下さい</option>
                                <option value="1">1時間</option>
                                <option value="2">2時間</option>
                                <option value="3">3時間</option>
                                <option value="3">3時間</option>
                                <option value="4">4時間</option>
                                <option value="5">5時間</option>
                                <option value="6">6時間</option>
                                <option value="6">7時間〜</option>
                                <option value="6">10時間〜</option>
                                <option value="6">12時間〜</option>
                            </select>
                        </div>
                        <p class="small_comment">※ 食事を一緒につくる場合、平均3時間ほどです。</p>
                    </section>
                </li>
                <!-- STEP4 -->
                <li class="hide">
                    <section class="host_form_qa_item">
                        <h3>【4-1】イベントのタイトルを記載して下さい。</h3>
                        <p class="small_comment">最大60文字です。ゲストの目に止まりやすいキャッチーなタイトルにしましょう！</p>
                        <p class="mt15">
                            <input type="text" name="title" class="input">
                        </p>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【4-2】イベントの詳細文を記載して下さい。</h3>
                        <p class="small_comment">500文字程度が目安です。<br>具体的にどんな体験を提供するのか、どんな料理をどのように作るのか、ゲストに伝えましょう。</p>
                        <p class="mt15">
                            <textarea name="event_explain" cols="100" rows="30" class="txtarea"></textarea>
                            <p>2322文字</p>
                        </p>
                    </section>
                </li>
                <!-- STEP5 -->
                <li class="hide">
                    <p class="small_comment">開催するイベントに関連するお写真を設定することができます。写真枚数は最大5枚です。</p>
                    <section class="host_form_qa_item">
                        <h3>【5-1】イベントTOP写真   ※必須</h3>
                        <p class="mt15">
                            <input type="file" name="picures1" enctype="multipart/form-data">
                        </p>
                        <p class="mt15">
                            <textarea name="picure1_text" cols="30" rows="5" class="txtarea" placeholder="写真の紹介文を記載してください。"></textarea>
                            <p>2322文字</p>
                        </p>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【5-2】その他の写真 （1） ※任意 </h3>
                        <p class="mt15">
                            <input type="file" name="picures2" enctype="multipart/form-data">
                        </p>
                        <p class="mt15">
                            <textarea name="picure2_text" cols="30" rows="5" class="txtarea" placeholder="写真の紹介文を記載してください。"></textarea>
                            <p>2322文字</p>
                        </p>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【5-3】その他の写真 （2） ※任意 </h3>
                        <p class="mt15">
                            <input type="file" name="picures3" enctype="multipart/form-data">
                        </p>
                        <p class="mt15">
                            <textarea name="picure3_text" cols="30" rows="5" class="txtarea" placeholder="写真の紹介文を記載してください。"></textarea>
                            <p>2322文字</p>
                        </p>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【5-4】その他の写真 （3） ※任意 </h3>
                        <p class="mt15">
                            <input type="file" name="picures4" enctype="multipart/form-data">
                        </p>
                        <p class="mt15">
                            <textarea name="picure4_text" cols="30" rows="5" class="txtarea" placeholder="写真の紹介文を記載してください。"></textarea>
                            <p>2322文字</p>
                        </p>
                    </section>
                    <section class="host_form_qa_item">
                        <h3>【5-5】その他の写真 （2） ※任意 </h3>
                        <p class="mt15">
                            <input type="file" name="picures4" enctype="multipart/form-data">
                        </p>
                        <p class="mt15">
                            <textarea name="picure4_text" cols="30" rows="5" class="txtarea" placeholder="写真の紹介文を記載してください。"></textarea>
                            <p>2322文字</p>
                        </p>
                    </section>
                </li>
                <!-- STEP6 -->
                <li class="hide">aaa6</li>
                <!-- STEP7 -->
                <li class="hide">aaa7</li>
            </ul>
            <p class="tac"><input type="submit" value="申し込む" class="host_register_btn"></p>
        </div>
    </form>
</main>
<?php include("../common/footertag.html")?>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="../../js/script.js"></script>
<script src="../../js/host_form.js"></script>
</body>
</html>