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
            content: '<div>ジーズアカデミー</div>'
        });
        //クリックされたら表示する
        // marker.addListener('click', function() {
        infowindow.open(map, marker);
        // });
    }
};

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

const set = {
    enableHightAccuracy: true,//ほとんどのケースでtrue 位置情報を性格に取得する
    timeout: 10000, //タイムアウトまで10000秒
    maximumAge: 1000
};

// //現在地をロード時に取得する
// navigator.geolocation.getCurrentPosition(mapsInit,mapsError,set); //最後に実行

//常に現在地を取得し続ける
function initMap(){
    navigator.geolocation.watchPosition(mapsInit,mapsError,set); //最後に実行
};



