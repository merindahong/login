
<?php

//若每個Page都會用到，可寫一個
//通用的 base page, 再到每個 page去執行
// php code:　include
// 最好放到每個Page上方
//以後若有修改，只要改base page就可以了
//也可透過迴圈看看是否要引用這個Base Page

$dsn="mysql:host=localhost; charset=utf8; dbname=mydb";
$pdo=new PDO($dsn, 'root', '');
session_start();
// 123: session_start();
// 123: 改為cookie, session要停掉
// 要有session start，有插入inclue的頁面，設定導頁之後，才會有導頁功能



function all($Atable){
    global $pdo;
    $sql= "Select * From $Atable";
    return $pod ->query($sql) ->fetchAll();    
}
//找到一筆指定資料
function find($Atable, $Aid){
    global $pdo;
    $sql= " Select * From $Atable Where id='$Aid'  ";
    return $pod ->query($sql) ->fetch();    
    // 取一筆，所以不用fetchALL
}

//把data的資料新增到資料庫
function insert($Atable, $Adata){
    global $pdo;

    $sql= " Insert Into $Atable Where id='$Adata'  ";
    return $pod ->query($sql) ->fetch();    
    // 取一筆，所以不用fetchALL
}

// 如何定義data？-->把data變成陣列，裡面有key有value
// id的欄位是自動增加，所以data可以不用設

$data=["acc"=>"0004",
"pw"=>"0004",
"name"=>"mark",

]

$row= " `acc`, `pw`, `name`, "

// Google: php陣列字串合併，將陣列轉成字串: implode是把value變成字串
// 但如何將key便成字串?

$value= implode (",", $data);
// 在function 中, echo $sql，若有問題可以印出，貼到SQL查看失敗原因





?>
