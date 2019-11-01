


<?php


include "base.php";

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
  

  
// $dsn="mysql:host=localhost; charset=utf8; dbname=mydb";
// $pdo=new PDO($dsn, 'root', '');
// 這個路徑可以省略了，因為base有寫了，且　page上方有 session

// Try 1
  // $sql="select * from user where acc= '$acc'
  // && pw= '$pw'";

  // 也可 Try 2 簡化搜尋到的資料
  // $sql="select count(*) as 'r' from user where acc= '$acc' && pw= '$pw'"; 沒有用到資料, try 3


  // try 3 為了連結mermber Page
  $sql="select id from user where acc= '$acc' && pw= '$pw'";


// set 1
 $data= $pdo->query($sql)->fetch();
// set 2 可 $data= $pdo->query($sql)->fetch(PDO::FETCH_ROWS); 
// set 3 可 $data= $pdo->query($sql)->fetchColumn();



  //撈出陣列資料(由data取詢問sql密件，密件內容為抓取acc和pw)

  // _____________________________________________
  // if($acc==$data ['acc'] && $pw= $data ['pw']){
  //   echo "登錄成功";
  // }else{
  //   echo "登錄失敗";
  // }
  // 但這不應該在此頁印出資料，會有安全性問題, try 2
// _________________________________________________
// print_r($data);
// if(!empty($data)){
//   echo "登錄成功";
// }else{
//   echo "登錄失敗";
// }  若去改sql有count，程式路徑變短，會更快 try 2

// print_r($data);
// if($data['r']==1) {
//   echo "登錄成功";
//   header("location:member_center.php");
//   //header指向另一個page 會員中心的page
// }else{
// echo "登錄失敗"; 
// header("location:index.php?err=1");
// //header指向另一個page, 為回到indext Page 但告訴php是 變數err的訊息 (?為php的程式，跑php的變數s，一定要給err一個值，可自由設定，如1
// // 有變數就要有值，所隨便設一個數字)
// }



// TRY 3
// print_r($data);
// if($data['r']==1) {
//   echo "登錄成功";
//   header("location:member_center.php");
//   //header指向另一個page 會員中心的page
// }else{
// echo "登錄失敗"; 
// header("location:index.php?err=1");
// //header指向另一個page, 為回到indext Page 但告訴php是 變數err的訊息 (?為php的程式，跑php的變數s，一定要給err一個值，可自由設定，如1
// // 有變數就要有值，所隨便設一個數字)
// }



// Try 4 為了連結member page $data改為id
print_r($data);
if(!empty($data)){
echo "登入成功";

//   //123, 建立coookie　２分鐘
// setcookie("login", 1, time()+120);
// setcookie("id", $data["id"], time()+120);


//DDDD 為了logout而設定
setcookie("login", 1, time()+3600);
setcookie("id", $data["id"], time()+3600);


header("location:member_center.php");

//回首頁就失去功能，除非重新開啟browser，或
//到C://XAMPP/tmp/刪除cookie
// 可於URL左邊i的樞紐，查看cookie的名字，刪除

}else{
  echo "登入失敗";
  header("location:index.php?err=1");
}	



?>