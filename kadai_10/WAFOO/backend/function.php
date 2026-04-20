<?php
//共通に使う関数を記述

function h($a)
{
    return htmlspecialchars($a, ENT_QUOTES);
}

function db_con(){
    try {
        return new PDO('mysql:dbname=wafoo_db;charset=utf8;host=localhost;unix_socket=/tmp/mysql.sock;','root','445340K326@ym'); //さくらの設定時はここで設定する[サーバー設定,ID名,パスワード（MAMPの場合はroot、XAMPの場合は空欄でOK）の順]
    } catch (PDOException $e) { //接続できなかったら
        exit('DB_CONECTION_ERROR:'.$e->getMessage());
    }
}


//--------セッションハイジャック対策（ログインしている人しか見れない）------------|
function chkSsid(){
    if(!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()){ //セットされていなければ、またはセッションIDが異なれば
        // exit('Login Error'); //本当はexit('');など空にしておくといい
        header('Location: ../../frontend/mypage/login.php');
    }else{
        session_regenerate_id(true); //正しければ新しいセッションIDに変える
        $_SESSION['chk_ssid']=session_id();//新しいセッションIDを挿入
    }
    //これを関数化すれば、どのページもログインしないと見れないページになる
}
//-----------------------------|