//タブの切り替え
function tabFunction(){
    $(function() {
        //参考URL:http://blog.three-co.jp/web/558/
        //クリックしたときのファンクションをまとめて指定
        $('.tab li').click(function() {
            //.index()を使いクリックされたタブが何番目かを調べ、
            //indexという変数に代入します。
            var index = $('.tab li').index(this);
            //コンテンツを一度すべて非表示にし、
            $('.mainContent ul').css('display','none');
            //クリックされたタブと同じ順番のコンテンツを表示します。
            $('.mainContent ul').eq(index).css('display','block');
            //一度タブについているクラスselectを消し、
            $('.tab li').removeClass('select');
            //クリックされたタブのみにクラスselectをつけます。
            $(this).addClass('select');
        });
    });
};
//ロードしたら読み込み
$(document).ready( function(){
    tabFunction();
});



//--------categryの追加------------------
$('#categoryAdd').on('click',function(){
    $('.categoryInput').addClass('open');
    i = i + 1;

    //----最後に入力されたテキストを空にする
    $('.categoryInput').val('');
});

// //クリックされたら・・
// $( '.categoryInput' ).keypress( function ( e ) {
//     if ( e.which == 13 ) {

//         //iの回数を保存したい
//         //ローカルストレージに i を保存
//         localStorage.setItem('i_count', i);

//         //テキストエリアに入力されたデータ
//         let v_category = $('.categoryInput').val();

//         //ローカルストレージに v を保存
//         localStorage.setItem('category' + i, v_category);

//         // カテゴリ追加
//         let category_item =  '<li id="category' + '_' + i + ' " ' + ' ' + 'class="category_item">' + v_category + '</li>' ;
//         $('.tab').append(category_item);

//         //再度非表示にする
//         $('.categoryInput').removeClass('open');

//         // --------------コンテンツ詳細の追加----------------------
//         $('.mainContent').append(bookmark_form);

//         return false;
//     }
// });


let v_category; //テキストエリアに入力されたデータ
// let categoryObject;//カテゴリの配列宣言
let categoryNo;//カテゴリID
let allObject = {};//ここに続けてbookmarkの配列をネストで入れていく

//メインカラム
let ulNo;  //カテゴリに紐付いて追加されるulのID

//クリックされたら(配列Ver)・・
$( '.categoryInput' ).keypress( function ( e ) {
    if ( e.which == 13 ) {

        //iの回数を保存したい
        //ローカルストレージに i を保存
        localStorage.setItem('i_count', i);

        //カテゴリID
        categoryNo = 'category' + i;

        v_category = $('.categoryInput').val();

        //カテゴリ配列の追加
        allObject.categoryObject = {'categoryName' : v_category};

        //ローカルストレージに v を保存
        localStorage.setItem(categoryNo, JSON.stringify(allObject.categoryObject));

        // カテゴリ追加
        let category_item =  '<li id="category' + '_' + i + ' " ' + ' ' + 'class="category_item">' + v_category + '</li>' ;
        $('.tab').append(category_item);

        //再度非表示にする
        $('.categoryInput').removeClass('open');



        //ーーーーーーーーフォームのoptionboxにカテゴリ名の追加ーーー
        $('#categorySelect').append('<option value = category' + i+'>' + allObject.categoryObject.categoryName + '</option>');

        //タブ機能の実装
        tabFunction();

        return false;
    }
});


/*----------ブックマークフォーム--------*/
//入力された値の変数
let selectVal;
let titleVal;
let urlVal;
let memoVal;
let bookmark; //bookmarkの出力HTML

$('#bookmarkAdd').on('click',function(){
    console.log('open');
    $('#bookmarkform_modal').addClass('open');

    //選択・入力されたテキストのクリア
    $('#categorySelect').val('');
    $('#form_title').val('');
    $('#form_url').val('');
    $('#form_memo').val('');
});

$('#formCloseBtn').on('click',function(){
    $('#bookmarkform_modal').removeClass('open');
});


//登録ボタンの入力時
$('#registerBtn').on('click',function(){
    selectVal = $("#categorySelect").val();
    titleVal = $("#form_title").val();
    urlVal = $("#form_url").val();
    memoVal = $("#form_memo").val();

    //ブックマークの配列の宣言,allObject配列にbookmarkItemを追加
    allObject.bookmarkItem = {
        'categoryID':selectVal,
        'title':titleVal,
        'url':urlVal,
        'memo':memoVal
    };

    //ローカルに保存
    localStorage.setItem(selectVal, JSON.stringify(allObject));//selectVal = categoryNo なのでそのまま入れる
    // console.log('selectVal =' + ' ' + selectVal);
    // console.log('categoryNo =' + ' ' + categoryNo);

    alert('ブックマークの登録が完了しました');
    $('#bookmarkform_modal').removeClass('open');


    //----------------mainカラムに ul 追加--------------
    ulNo = 'ulNo' + i; //ulのID
    $('.mainContent').append('<ul class="main_detail" id=' + ulNo + '></ul>');

    //メインカラムにブックマークアイテムを追加していく
    let bookmark = '<li><div class="picBox"><img src="img/firet.png" alt=""><p class="registerDay">2017/06/28</p></div><div class="textInfo"><p class="bkmTitle">'+ titleVal +'</p><p class="bkmUrl"><a href="'+ urlVal +'" target="_blank">' + urlVal + '</a></p><p class="bkmMemo">' + memoVal + '</p></div></li>';
    console.log(bookmark);

    $('#' + ulNo).append(bookmark);

});



//------------ロード時に表示--------------------------------------
//---カテゴリの数値----
let get_i = parseInt(localStorage.getItem('i_count'),10); //10進法でカウント
if(get_i){
    for (v = 1; v <= get_i; v++) {
        if(localStorage.getItem('category' + v)){
            let v_categoryLoad = JSON.parse(localStorage.getItem('category' + v));//JSONからの変換


            //-----------サイドバーの挙動----------------
            //---配列無し----
            //console.log(v_category.categoryName);
            //v_category.categoryNameでキーの値を拾ってくる
            $('.tab').append('<li id="category' + '_' + v + ' " ' + ' ' + 'class="category_item">' + v_categoryLoad.categoryName + '</li>');
            // $('#category' + v).val(v_category);

            // //---配列ありの場合-- 調整中箇所
            // $('.tab').append('<li id="category' + '_' + v + ' " ' + ' ' + 'class="category_item">' + v_categoryLoad.categoryObject.categoryName + '</li>');



            //formのoptionにカテゴリ名を表示
            $('#categorySelect').append('<option value = category' + v+'>' + v_categoryLoad.categoryName + '</option>');

            //メインカラムのulの保存
            ulNo = 'ul' + v;
            $('.mainContent').append('<ul class="main_detail" id=' + ulNo + '></ul>');


            //メインカラムにブックマークアイテムを追加していく
            let bookmark = '<li><div class="picBox"><img src="img/firet.png" alt=""><p class="registerDay">2017/06/28</p></div><div class="textInfo"><p class="bkmTitle">'+ titleVal +'</p><p class="bkmUrl"><a href="'+ urlVal +'" target="_blank">' + urlVal + '</a></p><p class="bkmMemo">' + memoVal + '</p></div></li>';
            console.log(bookmark);

            $('#' + ulNo).append(bookmark);
        }
    }
}
var i = $('.category_item').length; //カテゴリの数を数えて初期値に入れる




//追加でやること
//（１）リロード時のサイドバー表示の調整（配列にしたので）
// ✓(2) 配列の保存場所の指定（selectValで）
// ✓(3) メインカラムに表示させる
// (４) メインカラムで複数追加表示させる（上書き保存にしない）
// ✓(5) 非リロード時のタブの挙動 08/20
// (6) 画像のスクレイピング
// (7) タブの削除、修正機能
// (8) 保存時間の表示
// (9) メインカラムのブックマークの削除、修正機能