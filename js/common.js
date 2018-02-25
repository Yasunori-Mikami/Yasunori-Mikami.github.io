//DOMの読み込み
$(function(){
    console.log('読み込んだよ！');


    //----------グローバル変数--------------
    //window幅,高さの指定
    var windowWidth = $(window).width();
    var windowHeight = $(window).height();

    //topページライター欄の高さ
    var topWriterContainer = $('.top-writer-box').offset().top;
    //console.log('worksContainerTop: ' + worksContainerTop);


    //topページ カテゴリテキスト欄の高さ
    var CategoryTextContainer = $('.category-text').offset().top;
    //topページ カテゴリ項目欄の高さ
    var CategoryItemContainer = $('.top-category-animation').offset().top;


    //topページシゴトのジャンル-テキスト欄の高さ
    var topJanleTextContainer = $('.top-janle-text').offset().top;
    //topページシゴトのジャンル-項目欄の高さ
    var topJanleContainer = $('.top-sec-janle-item').offset().top;

    //topページ シゴトリスト欄の高さ
    var aboutJobContainer = $('.top-job-list-animation').offset().top;

    //topページabout テキスト欄の高さ
    var aboutTextContainer = $('.top-about-text').offset().top;
    //topページabout メリット詳細欄の高さ
    var aboutMeritContainer = $('.about-merit').offset().top;



    //----------スクロールイベント-------------
    $(window).on('scroll',function(){
        console.log('スクロールしている');//スクロールしている時だけ動作する

        //上からのスクロール値
        //var dy = $(this);//これだけだと色々な数値を確認できる
        //windowの座標を確認
        var dy = $(this).scrollTop();
        console.log('dy:' + dy);

        //-------スクロールのフェードアニメーション-------------------|
        //---------ライターTOPの表示-----------------------|
        //dyがtopWriter-container - windowの高さを引いた値になったら
        if(dy >= topWriterContainer - windowHeight){
            console.log('topWriter-containerだよ');
            $('.top-writer-box').addClass('fade-in-up');
        }


        if(dy >= CategoryTextContainer - windowHeight){
            $('.category-text').addClass('fade-in-up');
        }
        if(dy >= CategoryItemContainer - windowHeight){
            $('.top-category-animation').addClass('fade-in-up');
        }

        if(dy >= topJanleTextContainer - windowHeight){
            $('.top-janle-text').addClass('fade-in-up');
        }
        if(dy >= topJanleContainer - windowHeight){
            $('.top-sec-janle-item').addClass('fade-in-up');
        }


        if(dy >= aboutJobContainer - windowHeight){
            $('.top-job-list-animation').addClass('fade-in-up');
        }


        if(dy >= aboutTextContainer - windowHeight){
            $('.top-about-text').addClass('fade-in-up');
        }
        if(dy >= aboutMeritContainer - windowHeight){
            $('.about-merit').addClass('fade-in-up');
        }

    });
});

/*--------

     //----------windowをリサイズ(幅を変化させたら)したら------------------|
     $(window).on('resize', function(){
         console.log('リサイズ');
         windowWidth = $(window).width(); //リサイズした後のwindowWidthを上書き
         if(windowWidth > 767){
             //PC画面

         } else {
             //mobile画面

         }

     });

     //-----------Responsive navi（ハンバーガーメニュー）ーーーーーーー|
     //開く
     $('.mobile-menu').on('click',function(){
        console.log('ハンバーガー押されたよ');
        $('header nav').addClass('mobile-menu-open').addClass('fade-in');
     });
     //閉じる
     $('.mobile-close').on('click',function(){
        $('header nav').removeClass('mobile-menu-open').removeClass('fade-in');
     });


});


/*　アニメーション
0) jsファイルの作成と、リンク紐付け

1) /*スクロールフェードのために非表示にする
CSSの　.works sectionを非表示にする
opacityを0に！

※display noneだと表示にした分だけ下が上に詰まってしまう！


--------------------*/
