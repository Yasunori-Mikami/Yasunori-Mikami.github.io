//タブの切り替え
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

//クリックされたら(配列Ver)・・
$( '.categoryInput' ).keypress( function ( e ) {
    if ( e.which == 13 ) {

        //テキストエリアに入力されたデータ
        let v_category = $('.categoryInput').val();

        //iの回数を保存したい
        //ローカルストレージに i を保存
        localStorage.setItem('i_count', i);

        //カテゴリID
        let categoryNo = 'category' + i;

        //カテゴリに基づく配列
        let categoryObject = {'categoryName' : v_category}; //ここに続けてbookmarkの配列をネストで入れていく

        //ローカルストレージに v を保存
        localStorage.setItem(categoryNo, JSON.stringify(categoryObject));

        // カテゴリ追加
        let category_item =  '<li id="category' + '_' + i + ' " ' + ' ' + 'class="category_item">' + v_category + '</li>' ;
        $('.tab').append(category_item);

        //再度非表示にする
        $('.categoryInput').removeClass('open');



        //ーーーーーーーーフォームのoptionboxにカテゴリ名の追加ーーー
        $('#categorySelect').append('<option value = category' + i+'>' + categoryObject.categoryName + '</option>');

        console.log(categoryObject[0]);
        return false;
    }
});

//------------ロード時に表示----------------
//---カテゴリの数値----
let get_i = parseInt(localStorage.getItem('i_count'),10); //10進法でカウント
if(get_i){
    for (v = 4; v <= get_i; v++) {
        if(localStorage.getItem('category' + v)){
            let v_category = JSON.parse(localStorage.getItem('category' + v));//JSONからの変換

            //console.log(v_category.categoryName);
            //v_category.categoryNameでキーの値を拾ってくる
            $('.tab').append('<li id="category' + '_' + v + ' " ' + ' ' + 'class="category_item">' + v_category.categoryName + '</li>');
            // $('#category' + v).val(v_category);


            //formのoptionにカテゴリ名を表示
            $('#categorySelect').append('<option value = category' + v+'>' + v_category.categoryName + '</option>');

        }
    }
}
var i = $('.category_item').length; //カテゴリの数を数えて初期値に入れる

// /* オブジェクトの作り方メモ*/
// var object1 = {'a':'11', 'b':'22'};
// console.dir(object1);
// console.dir(object1.a);
// console.dir(object1['a']);

// var object3 = [
//     {'a':'11', 'b':'22'},
//     {'a':'11', 'b':'22'},
//     {'a':'11', 'b':'22'}
// ];


/*----------ブックマークフォーム--------*/
$('#bookmarkAdd').on('click',function(){
    console.log('open');
    $('#bookmarkform_modal').addClass('open');
});

$('#formCloseBtn').on('click',function(){
    $('#bookmarkform_modal').removeClass('open');
});