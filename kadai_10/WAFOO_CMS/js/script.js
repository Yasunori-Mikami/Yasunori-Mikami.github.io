
//モーダルクリックイベント
$('#hostDelete_btn').on('click',function(){
    $('.mordal_section').addClass('mordal_open');
    console.log('OK');
});

$('#mordalCansel_btn').on('click',function(){
    $('.mordal_section').removeClass('mordal_open');
    console.log('cansel');
});