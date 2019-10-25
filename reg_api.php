<?php
/***************************************************
 * 會員註冊行為：
 * 1.建立連線資料庫的參數
 * 2.判斷是否有送來表單資料
 * 3.建立所需的SQL語法
 * insert into user ()  values ();
 * 4.將表單資料以變數形式填入SQL語法中
 * 5.執行資料庫連線並送出SQL語法
 * 6.判斷SQL語法是否執行成功，執行下一步
 ***************************************************/
echo $acc= $_POST['acc']; echo "<br>";
echo $pw= $_POST['pw']; echo "<br>";
echo $name= $_POST['name']; echo "<br>";
echo $addr= $_POST['addr']; echo "<br>";
echo $tel= $_POST['tel']; echo "<br>";
echo $date= $_POST['date']; echo "<br>";
echo $email= $_POST['email']; echo "<br>";

//insert into user ()  values ();
$dsn="mysql:host=localhost; charset=utf8; dbname=mydb";
$pdo=new PDO($dsn, 'root', '');

$sql="insert into user (`acc`, `pw`, `name`, `addr`, `tel`, `birthday`,`email`)
values('$acc', '$pw', '$name', '$addr', '$tel', '$date', '$email')";
//SQL的id欄位可不用寫, PHP裡面, 雙引號裡面可以放$，在雙引號裡面的單引號，變數是有效的
//SQL的變數，用雙引號包覆

//送去SQL資料庫DB的語法 $pdo->qurey($sql)，若要印出，echo即可。
// 若有error，可將語法複製到MySQL，去讓檢查語法哪裡錯誤，在修改，
// 修改完之後，在貼回PHP page。

echo 'sql的語法是' . $sql;

// echo $pdo->query($sql);
// 或
// $rs= $pdo->query($sql);
// print_r($rs);

//$pdo->exec($sql); 用在不用回傳資料的時候，如 del, update, insert 

// echo $pdo->exec($sql);
// page回傳1，表示成功


// if($pdo->exec($sql)) {
//     echo "新增資料成功";
// }else{
//     echo "新增資料失敗，請洽詢管理人員";
// };


if($pdo->exec($sql)){
    // echo "新增資料成功"，跳回index page;
    //前面的 echo $pdo->exec($sql);要取消，否則無法執行exec
    header("location:index.php?s=1");
    //header指令導向位置為index，為回到html的頭欄位
}else{
    // echo "新增資料失敗，請洽詢管理人員，跳回reg page";
    header("location:reg.php?s=2");
}

//回index，加入if(!empty...)






?>