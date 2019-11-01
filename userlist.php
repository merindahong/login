<?php

include_once "base.php";

//取出全部資料
$sql="select * from user";
$rows=$pdo->query($sql)->fetchAll();

?>

<!-- __________________________________________________ -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>會員列表</title>
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


</head>

<body>
 <table>
    <tr>
        <td>姓名</td>
        <td>帳號</td>
        <td>地址</td>
        <td>電話</td>
        <td>email</td>
        <td>操作</td>
    </tr>

<?php
foreach($rows as $user){
    //抓$rows的 $user陣列
?> 
<!-- 回到html印出表格 -->

    <tr>
        <td><?=$user['name'];?></td>
        <td><?=$user['acc'];?></td>
        <td><?=$user['addr'];?></td>
        <td><?=$user['tel'];?></td>
        <td><?=$user['email'];?></td>
        <!-- <td><a href="deluser.php">刪除</a></td> 增加deluser Page之後，改下列指令
        寫入 ? id=
        < ? 開始PHP程式 = $user的陣列 ['id' ] ;  結束PHP程式-->  
             <td><a href="deluser.php?id=<?=$user['id'];?>">刪除</a></td>
    </tr>

    <!-- 再進去PHP，跑完迴圈之後，結束foreach指令 -->
<?php
}
?>

</table>   
</body>
</html>