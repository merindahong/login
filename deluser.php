<?php

include_once "base.php";

//方法一；把id丟給userlist的網址，所以要到userlist去修改
// 用get去抓取資料，這樣URL才看得到
$id=$_GET['id'];
$sql="DELETE FROM user WHERE id='$id'";
echo $sql;

// 方法二: 可設form，URL才看不到 (老師only示範, no code ref.))


$pdo->exec($sql);
//echo "<a href='userlist'>已刪除資料,回會員列表</a>";
header("location:userlist.php");
?> 


