

//---------------------MAP----------------------------------------------
//------A 正なら実行
function mapsInit(position){     //posiiton は引数→関数の中の緯度経度が入る
    const lat = position.coords.latitude; //緯度
    const lon = position.coords.longitude; //経度
    $('#map').html(initMap());

    var map;
    function initMap() {
        let pos = {
            lat: lat,
            lng: lon
        };

        //MAP 作成------------------------
        map = new google.maps.Map(document.getElementById('map'), {
            center: pos,
            zoom: 16 //1〜20で数字が大きい方がズームup！；
        });

        //マーカー作成----------------------
        //https://developers.google.com/maps/documentation/javascript/examples/marker-simple
        var marker = new google.maps.Marker({
            position: pos,
            map: map,
            title: 'Hello World!'
        });

        //info windows--------------------
        //https://developers.google.com/maps/documentation/javascript/examples/infowindow-simple
        var infowindow = new google.maps.InfoWindow({
            content: '<div>YOU ARE HERE</div>'
        });
        //クリックされたら表示する
        // marker.addListener('click', function() {
        infowindow.open(map, marker);
        // });
    }

    //----------------streetVew----------------------------------
    $('#streetView').html(initialize());
    var panorama;
    function initialize() {
        panorama = new google.maps.StreetViewPanorama(
            document.getElementById('streetView'),
            {
            position: {lat: lat, lng: lon},
            pov: {heading: 165, pitch: 0},
            zoom: 1
            });
    }

};

//------B エラーなら実行
function mapsError(error){
    let msg = '';
    if(error.code==1){
        msg = '位置情報の取得が許可されていません';
    }
    if(error.code==2){
        msg = '位置情報の取得が料できません';
    }
    if(error.code==3){
        msg = 'TIME OUT';
    }
    alert(msg);
};

//------C オプション設定
const set = {
    enableHightAccuracy: true,//ほとんどのケースでtrue 位置情報を正確に取得する
    timeout: 10000, //タイムアウトまで10000秒
    maximumAge: 1000
};


//-----D 実行する（常に現在地を取得し続ける）
// //現在地をロード時に取得する
// navigator.geolocation.getCurrentPosition(mapsInit,mapsError,set); //最後に実行

function initMap(){
    navigator.geolocation.watchPosition(mapsInit,mapsError,set); //最後に実行
};


//---ボタン押しても再度実行----
$('#nowBtn').on('click', function(){
    // function initMap(){};
    console.log('クリックされた！');
});



