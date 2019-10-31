

<?php



//若沒有include　base.php Page，就要先宣告使用session

// session_start();

//123 改為cookie
if(!empty($_COOKIE['login'])){
  // header("location:member_center.php?do=come"); 
  //pp因為做了session，導頁到member即可, 不用do=come
  //做了session之後，就無法回到 index page，除非關掉瀏覽器，再開一次，或到C:/XAMPP/tmp/刪除sess開頭的網站
  header("location:member_center.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="#" type="image/x-icon">
  <title>註冊登入系統</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

if(!empty($_GET['s'])){
  echo "註冊成功，請輸入帳密登錄";
}

if(!empty($_GET['err'])){
  echo "<h2> 帳號或密碼錯錄 </h2>";
}

?>



  <h1>會員登入</h1>
<form action="login_api.php" method="post"> 
<table class="wrapper">
  <tr>
    <td>帳號：</td>
    <td><input type="text" name="acc" id="acc"></td>
  </tr>
  <tr>
    <td>密碼：</td>
    <td><input type="password" name="pw" id="pw"></td>
  </tr>
  <tr>
    <td colspan="2" class="ct">
        <input type="submit" value="登入">
        <input type="reset" value="重置">
    </td>
  </tr>
  <tr>
    <td colspan="2" class="ct">
      <a href="reg.php" class="reg">註冊會員</a> 
      <a href="forget.php" class="reg">忘記密碼</a>
    </td>
  </tr>
</table>
</form>   
</body>
</html>
