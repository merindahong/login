<!-- <?php
// include_once "base.php";
 ?> -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <title>會員中心</title>
  <link rel="stylesheet" href="style.css">
</head>


<style>
  table{
    border-collapse:collapse;
    border-spacing:0;
  }
  td{
    border:1px solid #ccc;
    padding:10px;
    text-align:center;
  }
  </style>


<body>
  <div class="member">
    <div class="wellcome">

<?php


// include "base.php"; 共用檔可以放在page最上方，
// include_once "base.php"; 整個程式只會被載入一次，通常是共用檔才下once
//<!DOCTYPE html>之前，方便修改

// include "header.php"; 
// 或

 $file="header";
include $file . ".php";
// //以後只要改page名稱即可
//include和require差不多，但include可用於迴區，
// require可能不行
//用require若有錯誤，下面的code就都停止執行

?>

      HI! 歡迎光臨!以下是你的個人資料:
    </div>
    <div class="private">
      <!--請自行設計個人資料的呈現方式並從資料庫取得會員資料-->
<?php

// 要連結MySQL一定要寫下列路徑
$dsn="mysql:host=localhost; charset=utf8; dbname=mydb";
$pdo=new PDO($dsn, 'root', '');

$sql="select * from user where id=' ". $_GET['id']."  '  ";

//SQL裡面用單引號 ' 用字串包覆 「　" . $_GET['id']. " 　」這個指令
// where條件為 id= 是用GET抓取id陣列

//由於都在 Member Page測試，且抓取資料方式為get，
//可到URL尾端，直接寫入php程式 ? id=1，就會帶出 id為1的資料
//http://localhost/login/member_center.php?id=1
//若從Index Page會員登錄開始輸入，帳號密碼正確成功就會導入Member Page。


//若語法有錯誤，可echo出來，到MySQL查看語法哪裡有問題，進行修改

        //echo $sql;
        $user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        //print_r($user);
      ?>
      <table>
        <tr>
          <td>id</td>
          <td><?=$user['id'];?></td>
        </tr>
        <tr>
          <td>acc</td>
          <td><?=$user['acc'];?></td>
        </tr>
        <tr>
          <td>pw</td>
          <td><?=$user['pw'];?></td>
        </tr>
        <tr>
          <td>name</td>
          <td><?=$user['name'];?></td>
        </tr>
        <tr>
          <td>addr</td>
          <td><?=$user['addr'];?></td>
        </tr>
        <tr>
          <td>tel</td>
          <td><?=$user['tel'];?></td>
        </tr>
        <tr>
          <td>birthday</td>
          <td><?=$user['birthday'];?></td>
        </tr>
        <tr>
          <td>email</td>
          <td><?=$user['email'];?></td>
        </tr>
      </table>



    </div>
  </div>
</body>
</html>