// canvas base この指定がないとcanvasが機能しない
const can = $('#canvas')[0];
const ctx = can.getContext('2d'); //2Dの描画機能を引っ張ってくる  dは小文字でないと動かない！！
// console.log(ctx);


const ufo = {
    poxX: 0, //X座標の管理場所
    posY: can.height/2,//Y座標の管理場所
    flag: false,
    img: 'img/ufo.gif'
};

console.log(ufo);


//--------------------画像を表示する-------------------------
const ufoDraw = function(){
    //画像の表示
    const newImage = $('<img>').attr('src',ufo.img);

    newImage.on('load',function(){  //画像データが読み込まれたら実行
        console.log(this);  //ここでthisはイベントが発生するきっかけを指している = newImageのこと
        // ctx.drawImage(this,0,can.height/2); //ちょうどcanvasの真ん中に配置する
        ctx.drawImage(this,0,ufo.posY); //ちょうどcanvasの真ん中に配置する

        //ロードしないと高さと幅は取得できない。画像を消す際に、高さと幅を指定する必要があるため、ここで取得。
        ufo.img = this; //ufoオブジェクトに画像データ追加
        ufo.width = this.width; //ufoオブジェクトに画像幅追加
        ufo.height = this.height; //ufoオブジェクトに画像高さ追加
        console.log(ufo.height);
    });
};

$(window).on('load',function(){
    ufoDraw();
});




//--------------------マウスの動きに応じて画像を表示する-------------------------
const ufoMove = function(e){ //eはイベントオブジェクトの略
    // console.log(e.offsetY); //マウスの動いた座標を表示
    ctx.clearRect(0, ufo.posY, ufo.width, ufo.height); //画像を消す 消す時は高さと幅を指定する必要がある。（消す処理は高さと幅の領域を消す！という処理になる）
    ufo.posY = e.offsetY;//新しいY座標を設定（マウスの位置）
    ctx.drawImage(ufo.img, 0, ufo.posY);//画像を表示。高さと幅は指定の省略ができる
}
$(can).on('mousemove',ufoMove); //canvas上で動いたら



//--------------------画面の右側にも的の画像を表示する-------------------------
const enemyImage = $('<img>').attr('src','img/stamp10.png');
enemyImage.on('load',function(){
    ctx.drawImage(this,720,250);
});


/*---------------------------
* 敵について
*--------------------------*/
const enemy = {
    posX:can.width - 82,
    posY:can.height/2,
    img:"img/stamp10.png",
}
const enemyDraw = function(){
    const newImage = $("<img>").attr("src",enemy.img);
    newImage.on("load",function(){
    ctx.drawImage(this, enemy.posX, enemy.posY);
    enemy.img = this;
    enemy.posX = enemy.posX - this.width;
    enemy.width=this.width;
    enemy.height=this.height;
    });
};

$(window).on("load",function(){
    enemyDraw(); //ここが追加
});





//------------------一つひとつの弾のオブジェクト
const ballData = {
    speed: 1, //ピクセル数で処理の残像が追いつかない場合もある
    width: 10,
    height: 10,
    posX: 0,
    posY: 0,
    color: '#f00'
}
//→弾を複製する必要がある！（上書きだと、弾がなくなってしまう！）

//これだと上書きしてしまう↓
// const ballData2 = ballData; //ballDataをコピーしている
// ballData2.color = "#00f";
// console.log(ballData.color);

//なので、Object.assignで上書きされないようにする
const ballData2 = Object.assign({},ballData); //ballDataをコピーしている
ballData2.color = "#00f";
console.log(ballData.color);

//発射された弾を格納するための配列を作成
const ballGroup = [];

const shootBall = function(e){
    const newShootBall =  Object.assign({},ballData);
    newShootBall.posX = ufo.width;
    newShootBall.posY = ufo.posY + (ufo.height/2 - newShootBall.height/2);//UFOの真ん中から弾が出るようにする
    ctx.fillStyle = newShootBall.color;
    ctx.fillRect(newShootBall.posX, newShootBall.posY, newShootBall.width,newShootBall.height);

    ballGroup.push(newShootBall);
    console.log(ballGroup);
}

$(can).on('mousedown', shootBall);


//弾を動かす
//forEach文：配列の1つ1つに同じ命令を順番に行うことができる
//配列名.forEach(function(ball){
//
//});
const moveBall = function(){
    ballGroup.forEach(function(ball){
        ctx.clearRect(ball.posX, ball.posY, ball.width, ball.height);
        ctx.fillStyle = ball.color;
        ball.posX += ball.speed; //スピードの分だけ座標を足している
        ctx.fillRect(ball.posX, ball.posY, ball.width, ball.height);
    });
};

setInterval(function(){
    moveBall();
},10)



//不要な弾は配列から削除する
const deleteBall = function(){
    for(let i = 0; i < ballGroup.length; i++){
        if(ballGroup[i].posX >= can.width){
            ballGroup.splice(i,1);
        }
    }
};
setInterval(function(){
    moveBall();
    deleteBall();
},10);






//円を出現させる
ctx.fillStyle = "#0f0";//塗り潰し色の指定
ctx.strokStyle = "#0ff";

let count = 780;
setInterval(function(){
    ctx.clearRect(count,480,40,20);
    count--;
    ctx.fillRect(count,480,40,20);
},20);
// ctx.fillRect(100,100,20,20);
// ctx.strokeRect(100,100,100,100);
// ctx.clearRect(350,350,30,30);

