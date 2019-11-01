 <?php
 
include_once "base.php";
 
 // include_once "base.php";
// if(empty($_SESSION['login'])){
  // exit();
// }

//123
if(empty($_COOKIE["login"])){
  // exit(); //意旨PHP程式執行到這個地方後停止，Apache不再執行
  header("location:index.php");
  exit(); //DDD 導入header，PHP的程式執行到此後停止，

}

//到C:/XAMPP/temp/開頭為 sess的檔案就是server的cookie紀錄
// 用VS打開檔案，有敘述使用過的指令痕跡
// for session 放在最上端，是放在server端的判斷，安全性高 
//http://localhost/login/member_center.php?do=come
// 而非id=1不會透漏id訊息　（get會是 id=1)

?> 



 


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

// include "header.php"; // 或

 $file="header";
include $file . ".php";
// //以後只要改page名稱即可
//include和require差不多，但include可用於迴區，require可能不行
//用require若有錯誤，下方的code就都停止執行

?>

      HI! 歡迎光臨!以下是你的個人資料:
    </div>
    <div class="private">
<!-- DDD做登出連結 -->
    <a href="logout.php">登出></a>


    
      <!--請自行設計個人資料的呈現方式並從資料庫取得會員資料-->
<?php

// 要連結MySQL一定要寫下列路徑
//pp當作了seesion 下列路徑就可省略
// $dsn="mysql:host=localhost; charset=utf8; dbname=mydb";
// $pdo=new PDO($dsn, 'root', '');

// $sql="select * from user where id=' ". $_GET['id']."  '  ";

// 改成用session判斷，如此user就不能改URL為 id=1
// 當瀏覽器關掉，session就會被清除，再打開便可登入
//瀏覽器不一樣時，session也會不一樣
// 若用無痕模式登入，session也會不一樣
// session是根據每次和瀏覽器的連線而建立

///123
$sql="select * from user where id='".$_COOKIE['id']."'";


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



  <!-- how: 設定登入一次之後，就不用一直登入，讓首頁知道已經登入了，不要一直叫我登入   -->
  <!-- PHP用session搭配cookie -->
  <div>
  <a href="index.php">回首頁</a>
  </div>
 

  
  
</body>
</html>