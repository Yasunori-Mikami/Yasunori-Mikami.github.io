//ーーーーーーー Firebase ーーーーーー  //
// Initialize Firebase
var config = {
    apiKey: "AIzaSyC5iiZkr9mvoApW54pFuSnSDOhtARXb7zc",
    authDomain: "chatapp0818.firebaseapp.com",
    databaseURL: "https://chatapp0818.firebaseio.com",
    projectId: "chatapp0818",
    storageBucket: "",
    messagingSenderId: "617129477873"
};
firebase.initializeApp(config);

//MSG 送受信準備
let newPostRef = firebase.database().ref();

function ok(){
    console.log('OK');
};

//投稿日データ
let d = new Date;
let postTime = d.getMonth() + '月' + d.getDate() + '日' + ' ' + d.getHours() + ':' + d.getMinutes();

//イベント処理
$('#submit').on('click', function(){

    newPostRef.push({
        name: $('#userName').val(),
        message: $('#message').val(),
        Time: postTime.toString()  //文字列に変換
    });

    // console.log(newPostRef.name);

    //入力したデータを消す
    // $('#userName').val('');
    $('#message').val('');
    ok();
});


//メインカラムにBOX枠を追加
let columnBox = '';
    columnBox += '<div class="columnBox">';
    columnBox += '<h2>トークチャット 1</h2>';
    columnBox += '<div class="chatBox"></div>';
    columnBox += '</div>';
$('#mainColumn').append(columnBox);

//トークルームの追加
$('#addChatBtn').on('click', function(){
    $('#mainColumn').append(columnBox);

    $('#mainColumn').scrollLeft( $('#mainColumn')[0].scrollWidth );

});


//写真データ
let profPic = $('#profileImage').attr('src');

//MSGデータを引っ張ってきて、BOXにpostItemを追加
newPostRef.on('child_added', function(postData){
    const allData = postData.val();
    console.log(allData);

    const key = postData.key;
    console.log(key); //firebase側でデータごとに自動で割り振られるキー

    //---------------- post Item の出力(1)-------------------
    // let postItem = '';
    // postItem += '<div class="postItem">';
    // postItem += '<div class="profBox">'
    //     postItem += '<img src="' + profPic + '" alt="" class="mainPic">';
    //     postItem += '<p class="mainName">'+ allData.name + '</p>';
    // postItem += '</div>'
    // postItem += '<div class="MessageBox">'
    //     postItem += '<div class="mainMessage">' + allData.message + '</div>';
    //     postItem += '<div class="mainTime">' + allData.Time + '</div>'; //配列の項目名名
    // postItem += '</div>'
    // postItem += '</div>';

    // $('.chatBox').append(postItem);



    //-------------- post Item の出力(2)-------------------
    var compiled = _.template($('#postItem').html());

    $('.chatBox').append(compiled({profPic:profPic,allData:allData,}));


    //追加後一番下に自動スクロールする
    $('.chatBox').scrollTop( $('.chatBox')[0].scrollHeight );
});