


<?php

function all($Btable){
    include_once "base.php"; 
    $sql="select * from $Btable";
    // from $table表格名稱
    return $pdo->query($sql)->fetchAll();
}


// 找某個id的資料
function find($Atable,$Aid){
    // include_once "base.php"; 
    // ==>若要找find第二筆，要改為 (AAA notes:)
    global $pdo;
    $sql2=" Select * from $Atable Where id='$Aid' ";
    // 原始SQL語法為 select * from user where id=1，找出id 1的資料，
    // 改為變數 $Atable和 $Aid。
    return $pdo->query($sql2)->fetch();
}

$user=find('user',1);
// 或find(9)['name']; // 若沒有id 9就跑不出來
echo $user['addr'];



echo "<hr>";
$user2=find('user',1);
echo $user2['name'];

// 但由於有session，find第二次，就會出現error。
// 把function中的include的once拿掉，就可以find第二次，因為include_once把base檔引入，但若執行兩次，就會NG。
// include_once執行兩次，第二次會失效，因為以第一次為主，第二次並不會再include。
// 最好把MySQL路徑 
// ($dsn="mysql:host=localhost; charset=utf8; dbname=mydb";
// $pdo=new PDO($dsn, 'root', '');
// session_start();
// 放進function，取代include_once即可。
// 或AAA notes


// 可將function放到base裡，再到每頁放入include即可，簡化code



?>