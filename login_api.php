<?php
/***************************************************
 * 會員登入行為：
 * 1.建立連線資料庫的參數
 * 2.判斷是否有送來表單資料
 * 3.從資料庫取得資料
 * 4.比對表單資料和資料庫資料是否一致
 * 5.根據比對的結果決定畫面的行為
  ***************************************************/
  echo $acc= $_POST['acc']; echo "<br>";
  echo $pw= $_POST['pw']; echo "<br>";
  

$dsn="mysql:host=localhost; charset=utf8; dbname=mydb";
$pdo=new PDO($dsn, 'root', '');

// Try 1
  // $sql="select * from user where acc= '$acc'
  // && pw= '$pw'";

  // 也可 Try 2 簡化搜尋到的資料
  $sql="select count(*) as 'r' from user where acc= '$acc' && pw= '$pw'";


// set 1
 $data= $pdo->query($sql)->fetch();
// set 2
  // $data= $pdo->query($sql)->fetch(PDO::FETCH_ROWS);
// set 3
//  $data= $pdo->query($sql)->fetchColumn();



  //撈出陣列資料(由data取詢問sql密件，密件內容為抓取acc和pw)

  // _____________________________________________
  // if($acc==$data ['acc'] && $pw= $data ['pw']){
  //   echo "登錄成功";
  // }else{
  //   echo "登錄失敗";
  // }

  // 但這不應該在此頁印出資料，會有安全性問題, try next
// _________________________________________________
// print_r($data);
// if(!empty($data)){
//   echo "登錄成功";
// }else{
//   echo "登錄失敗";
// }  若去改sql有count會更快 see try 2 below

print_r($data);
if($data['r']==1) {
  echo "登錄成功";
  header("location:member_center.php");
  //header指向另一個page 會員中心的page
}else{
echo "登錄失敗"; 
header("location:index.php?err=1");
//header指向另一個page, indext但告訴PHP是 err的訊息
}











?>