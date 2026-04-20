<?php
//1.  DB接続します
include "backend/function.php";
$pdo = db_con();

//２．データ登録SQL作成
//A 全てのデータを取得
$stmt = $pdo->prepare("SELECT * FROM wafoo_host_table order by id desc");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQL_ERROR:".$error[2]);

}else{
    // //--------A 全ての回答を表示する場合---------------
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        //下書きの場合
        if($result["hostPreview"] == "0"){
            $view .= '<tr>';
            $view .= '<td><a href="'.'hostDetail.php?id='.$result["id"].'">編集'.'</a></td>';
            $view .= '<td>'.'#_'.$result["id"].'</td>';
            $view .= '<td>'.$result["sei"].'</td>';
            $view .= '<td>'.$result["mei"].'</td>';
            $view .= '<td>'.$result["sex"].'</td>';
            $view .= '<td>'.$result["age"].'</td>';
            $view .= '<td>'.$result["mail"].'</td>';
            $view .= '<td>'.$result["indate"].'</td>';
            $view .= '<td>'.'調整中'.'</td>';
        } else {
        //下書きでない場合
            $view .= '<tr>';
            $view .= '<td><a href="'.'hostDetail.php?id='.$result["id"].'">編集'.'</a></td>';
            $view .= '<td>'.$result["id"].'</td>';
            $view .= '<td>'.$result["sei"].'</td>';
            $view .= '<td>'.$result["mei"].'</td>';
            $view .= '<td>'.$result["sex"].'</td>';
            $view .= '<td>'.$result["age"].'</td>';
            $view .= '<td>'.$result["mail"].'</td>';
            $view .= '<td>'.$result["indate"].'</td>';
            $view .= '<td>'.'調整中'.'</td>';
        }
    }
}
?>
<?php include("frontend/headtag.html")?>
<?php include("frontend/header.php")?>
<main>
    <?php include("frontend/sidebar.php")?>
    <div class="mainContents">
        <h2>Host List</h2>
        <table class="hostList_table">
            <tr>
                <th>Action</th>
                <th>id</th>
                <th>姓</th>
                <th>名</th>
                <th>性別</th>
                <th>年齢</th>
                <th>メールアドレス</th>
                <th>登録日</th>
                <th>最終更新日</th>
            </tr>
            <?=$view?>
        </table>
    </div>
</main>
<?php include("frontend/footertag.html")?>