//----ユーザーの手--------------
// let your_hand = '';

// const hand_gu = 1;
// const hand_choki = 2;
// const hand_par = 3;


//----------TOPに戻る仕様(毎回戻る)--------------
$('html,body').animate({ scrollTop: 0 }, '1');


//-------------HP--------------
var my_hp = 100;
var comp_hp = 150;



//--------勝率カウント----------
//イベント発生数の初期値を設定
//全体の数値
var total_num = 0;
var win_num = 0; //勝数
var lose_num = 0; //負け数
var draw_num = 0; //引き分け数

//--グーの数値------
var rock_total_num = 0;
var rock_win_num = 0;
var rock_lose_num = 0;
var rock_draw_num = 0;

//--チョキの数値------
var cho_total_num = 0;
var cho_win_num = 0;
var cho_lose_num = 0;
var cho_draw_num = 0;

//--パーの数値------
var paper_total_num = 0;
var paper_win_num = 0;
var paper_lose_num = 0;
var paper_draw_num = 0;


//----少数点の切り上げする関数--------
// let point = function(num, digit){
//     let time_10 = Math.pow(10, digit);
//     return Math.floor(num * time_10) / time_10;
// }
let point = function(num, digit){
    let time_10 = Math.pow(10, digit);
    return Math.floor(num * time_10);
}



//クリック全体のイベント-----
$('#hand_list').on('click',function(){
    //カウントアップする関数 countUp の定義ーーーーーーーーーーーーーーーーーーー
    //----分母-------
    total_num++;
    $('.total_num').text(total_num);

    //----分子(勝った数)-------  winの数をいかにカウントするのか？----
    var win_num = rock_win_num + cho_win_num + paper_win_num; //勝数
    $('#win_num').text(win_num);

    //----分子(負けた数)-------  winの数をいかにカウントするのか？----
    var lose_num = rock_lose_num + cho_lose_num + paper_lose_num;
    $('#lose_num').text(lose_num);

    //----分子(引き分け数)-------  winの数をいかにカウントするのか？----
    var draw_num = rock_draw_num + cho_draw_num + paper_draw_num;
    $('#draw_num').text(draw_num);

    //----勝率-------------
    let percent_win = win_num / total_num;
    $('#percent_win').text(point(percent_win, 2) + '%');


    //---------グーの数値-------------|
    let percent_rock_win = rock_win_num / rock_total_num;
    $('#percent_rock_win').text(point(percent_rock_win, 2) + '%');

    let percent_rock_lose = rock_lose_num / rock_total_num;
    $('#percent_rock_lose').text(point(percent_rock_lose, 2) + '%');

    let percent_rock_draw = rock_draw_num / rock_total_num;
    $('#percent_rock_draw').text(point(percent_rock_draw, 2) + '%');

    // ☆☆☆分母は全体の試行回数ではなく、その手を出した数にすべきかも・・・・


    //---------チョキの数値-------------|
    let percent_cho_win = cho_win_num / cho_total_num;
    $('#percent_cho_win').text(point(percent_cho_win, 2) + '%');

    let percent_cho_lose = cho_lose_num / cho_total_num;
    $('#percent_cho_lose').text(point(percent_cho_lose, 2) + '%');

    let percent_cho_draw = cho_draw_num / cho_total_num;
    $('#percent_cho_draw').text(point(percent_cho_draw, 2) + '%');


    //---------パーの数値-------------|
    let percent_paper_win = paper_win_num / paper_total_num;
    $('#percent_paper_win').text(point(percent_paper_win, 2) + '%');

    let percent_paper_lose = paper_lose_num / paper_total_num;
    $('#percent_paper_lose').text(point(percent_paper_lose, 2) + '%');

    let percent_paper_draw = paper_draw_num / paper_total_num;
    $('#percent_paper_draw').text(point(percent_paper_draw, 2) + '%');



    //-----HPイベントーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

    if(my_hp <= 50){
        $('.my_hp').css('color', '#FFCC33');
    }
    if(my_hp <= 10){
        $('.my_hp').css('color', '#CC0033');
    }


    if(comp_hp <= 50){
        $('.comp_hp').css('color', '#FFCC33');
    }
    if(comp_hp <= 10){
        $('.comp_hp').css('color', '#CC0033');
    }


    //----終了コメント-------
    if(my_hp == 0){
        alert('あなたの負けです。対戦成績を見て反省しましょう。');
        // $('#music').html('<source src="music/30_monster_win.wav" type="audio/wav">');
    }

    if(comp_hp == 0){
        alert('おめでとうございます！あなたの勝ちです！対戦成績をチェックしてみましょう');
    }

});



//打ち手と数値 グー:1  / チョキ:2 / パー:3
//----PCの出した手-------------
let comp_hand = '';

const win = '<span class="start_delay">You Win !</span>';
const lose = '<span class="start_delay">You Lose・・</span>';
const draw = '<span class="start_delay">Draw</span>';

//---グーを選択した時---------------
$('#gu_btn').on('click',function(){
    $('#myHand_img').html('<img src="img/yourHand/fist.png" class="myHand" alt="" >');

    //試行回数→レポートに表示
    rock_total_num = rock_total_num +1;
    $('#rock_total_num').text(rock_total_num);


    comp_hand = Math.ceil(Math.random() * 3);
    if(comp_hand == 1){
        $('#pc_hands').text('ROCK');
        $('#compHand_img').html('<img src="img/compHand/diamond.png" class="compHand" alt="" >');
        $('#judgemnt_start').html(draw);
        rock_draw_num = rock_draw_num +1; //引き分けカウント +1
    } else if(comp_hand == 2){
        $('#pc_hands').text('SCISSORS');
        $('#compHand_img').html('<img src="img/compHand/chainsaw.png" class="compHand" alt="" >');
        $('#judgemnt_start').html(win);
        rock_win_num = rock_win_num +1; //勝ちカウント +1

        //-----comHP----------
        comp_hp = comp_hp - 10;

    } else if(comp_hand == 3){
        $('#pc_hands').text('PAPER');
        $('#compHand_img').html('<img src="img/compHand/toilet-paper.png" class="compHand" alt="" >');
        $('#judgemnt_start').html(lose);
        rock_lose_num = rock_lose_num +1; //負けカウント +1

        //-----myHP----------
        my_hp = my_hp - 10;

    }
    $('.my_hp').text('HP ' + my_hp + ' / 100');
    $('.comp_hp').text('HP ' + comp_hp + ' / 150');
});

//---チョキを選択した時---------------
$('#cho_btn').on('click',function(){
    $('#myHand_img').html('<img src="img/yourHand/victory.png" class="myHand" alt="" >');

    //試行回数→レポートに表示
    cho_total_num = cho_total_num +1;
    $('#cho_total_num').text(cho_total_num);


    comp_hand = Math.ceil(Math.random() * 3);

    if(comp_hand == 1){
        $('#pc_hands').text('ROCK');
        $('#compHand_img').html('<img src="img/compHand/diamond.png" class="compHand" alt="" >');
        $('#judgemnt_start').html(lose);
        cho_lose_num = cho_lose_num +1; //負けカウント +1

        //-----HP----------
        my_hp = my_hp - 10;

    } else if(comp_hand == 2){
        $('#pc_hands').text('SCISSORS');
        $('#compHand_img').html('<img src="img/compHand/chainsaw.png" class="compHand" alt="" >');
        $('#judgemnt_start').html(draw);
        cho_draw_num = cho_draw_num +1; //引き分けカウント +1
    } else if(comp_hand == 3){
        $('#pc_hands').text('PAPER');
        $('#compHand_img').html('<img src="img/compHand/toilet-paper.png" class="compHand" alt="" >');
        $('#judgemnt_start').html(win);
        cho_win_num = cho_win_num +1; //勝ちカウント +1

        //-----comHP----------
        comp_hp = comp_hp - 10;
    }

    $('.my_hp').text('HP ' + my_hp + ' / 100');
    $('.comp_hp').text('HP ' + comp_hp + ' / 150');
});

//----パーを選択した時---------------
$('#par_btn').on('click',function(){
    comp_hand = Math.ceil(Math.random() * 3);
    $('#myHand_img').html('<img src="img/yourHand/hold.png" class="myHand" alt="" >');

    //試行回数→レポートに表示
    paper_total_num = paper_total_num +1;
    $('#paper_total_num').text(paper_total_num);

    if(comp_hand == 1){
        $('#pc_hands').text('ROCK');
        $('#compHand_img').html('<img src="img/compHand/diamond.png" class="compHand" alt="" >');
        $('#judgemnt_start').html(win);
        papar_win_num = paper_win_num +1; //勝ちカウント +1

        //-----comHP----------
        comp_hp = comp_hp - 10;

    } else if(comp_hand == 2){
        $('#pc_hands').text('SCISSORS');
        $('#compHand_img').html('<img src="img/compHand/chainsaw.png" class="compHand" alt="" >');
        $('#judgemnt_start').html(lose);
        paper_lose_num = paper_lose_num +1; //負けカウント +1

        //-----HP----------
        my_hp = my_hp - 10;

    } else if(comp_hand == 3){
        $('#pc_hands').text('PAPER');
        $('#compHand_img').html('<img src="img/compHand/toilet-paper.png" class="compHand" alt="" >');
        $('#judgemnt_start').html(draw);
        paper_draw_num = paper_draw_num +1; //引き分けカウント +1
    }

    $('.my_hp').text('HP ' + my_hp + ' / 100');
    $('.comp_hp').text('HP ' + comp_hp + ' / 150');
});

//--------プレイ成績を見るボタン-----------
$('.reportBtn').on('click',function(){
    $('.report').css('display', 'block');
    $('.reportBtn').css('display', 'none');
});

//--------リロードボタン-----------
$('.restartBtn').on('click',function(){
    location.reload();
});



//------スムーズスクロール------------|
$(function(){
    $('a[href^="#"]').click(function(){
    var speed = 400;
    var href= $(this).attr("href");
    var target = $(href == "#" || href == "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body").animate({scrollTop:position}, speed, "swing");
    return false;
    });
});


//------ステージの切り替え------------|
$('#switch_stage').on('click',function(){
    $('.stage').css('background-image', 'url(img/stage/hell.jpg)');
    $('.player_title').css('color', '#ffffff');
    $('#judgemnt_start').css('color', '#ffffff');
});


// $('#switch_stage').on('click',function(){
//     $('.stage').css('background-image', 'url(img/stage/space.jpg)');
// });

// $('#switch_stage').on('click',function(){
//     $('.stage').css('background-image', 'url()');
// });



// $('#switch_stage').toggle(
//     function(){
//     $('.stage').css('background-image', 'url(img/stage/space.jpg)');
// }, function(){
//     $('.stage').css('background-image', 'url(img/stage/hell.jpg)');
// }, function(){
//     $('.stage').css('background-image', 'url()');
// });


