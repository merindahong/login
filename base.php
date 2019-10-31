
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
// 要有session start，有插入inclue的頁面，設定導頁之後，才會有導頁功能

?>
