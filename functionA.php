<?php




// 0202:
function all($table){
    //回傳整個資料表的內容
    include_once "base.php";
    //取出全部資料
    $sql="select * from $table";
    // from $table表格名稱
    // $rows=$pdo->query($sql)->fetchAll(); 或
    return $pdo->query($sql)->fetchAll();



}
$rows=all("user");
//帶入表格名稱，就可以抓出所有資料
// 可將這個function執行的結果當作變數，讓下方的foreach使用

?>
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

?> 
    <tr>
        <td><?=$user['name'];?></td>
        <td><?=$user['acc'];?></td>
        <td><?=$user['addr'];?></td>
        <td><?=$user['tel'];?></td>
        <td><?=$user['email'];?></td>

             <td><a href="deluser.php?id=<?=$user['id'];?>">刪除</a></td>
    </tr>

<?php
}
?>

</table> 








?>