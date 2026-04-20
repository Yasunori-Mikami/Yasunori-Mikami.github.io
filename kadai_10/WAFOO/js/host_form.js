//タブの切り替え
$(function() {
    //クリックしたときのファンクションをまとめて指定
    $('.host_form_tab li').click(function() {
    //.index()を使いクリックされたタブが何番目かを調べ、
        //indexという変数に代入します。
        var index = $('.host_form_tab li').index(this);

        //コンテンツを一度すべて非表示にし、
        $('.host_form_content li').css('display','none');

        //クリックされたタブと同じ順番のコンテンツを表示します。
        $('.host_form_content li').eq(index).css('display','block');

        //一度タブについているクラスselectを消し、
        $('.host_form_tab li').removeClass('select');

        //クリックされたタブのみにクラスselectをつけます。
        $(this).addClass('select')
    });
});

// //ロードしたら読み込み
// $(document).ready( function(){
//     tabFunction();
// });