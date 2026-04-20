//-------------フィードインアニメーション--------------
//----------グローバル変数--------------
//window幅,高さの指定
var windowWidth = $(window).width();
var windowHeight = $(window).height();

//hosttopページ about欄の高さ
var host_top_about = $('#top_about').offset().top;

//hosttopページ merit欄の高さ
var host_top_merit = $('#top_merit').offset().top;

//hosttopページ plan欄の高さ
var host_top_plan = $('#top_plan').offset().top;

//hosttopページ flow欄の高さ
var host_top_flow = $('#top_flow').offset().top;

//hosttopページ experience欄の高さ
var host_top_ex = $('#host_top_experience').offset().top;

//hosttopページ qa欄の高さ
var host_top_qa = $('#host_top_qa').offset().top;

//----------スクロールイベント-------------
$(window).on('scroll',function(){
    console.log('スクロールしている');//スクロールしている時だけ動作する
    //上からのスクロール値
    //var dy = $(this);//これだけだと色々な数値を確認できる
    //windowの座標を確認
    var dy = $(this).scrollTop();
    console.log('dy:' + dy);

    //-------スクロールのフェードアニメーション
    //dyがtopWriter-container - windowの高さを引いた値になったら
    //host_about
    if(dy >= host_top_about - windowHeight){
        $('#top_about').addClass('fade-in-up');
    }
    //host_merit
    if(dy >= host_top_merit - windowHeight){
        $('#top_merit').addClass('fade-in-up');
    }
    //host_plan
    if(dy >= host_top_plan - windowHeight){
        $('#top_plan').addClass('fade-in-up');
    }
    //host_flow
    if(dy >= host_top_flow - windowHeight){
        $('#top_flow').addClass('fade-in-up');
    }
    //host_ex
    if(dy >= host_top_ex - windowHeight){
        $('#host_top_experience').addClass('fade-in-up');
    }
    //host_qa
    if(dy >= host_top_qa - windowHeight){
        $('#host_top_qa').addClass('fade-in-up');
    }
});