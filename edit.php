
<!-- 到web F12, Network, header下拉可看到 user有送東西進來 -->
<!-- 再用post抓下來 -->
<!-- member page的 form action 有設 edit.php page連結，當user 按下submit，就會連結到edit.php page裡面。 -->
<?php


include "base.php";
$id=$_POST['id'];
$name=$_POST['name'];
$addr=$_POST['addr'];
$tel=$_POST['tel'];
$birthday=$_POST['birthday'];
$email=$_POST['email'];


// 方法一：若有SESSION id時，可用此指令，但並不是所有page都有SESSION，所以應該用方法二
//$sql="update user set name='$name',addr='$addr',tel='$tel',birthday='$birthday',email='$email' where id='".$_SESSION['id']."'";


//方法二：若沒用SESSION id，用$pdo跟MySQL索取資料時，記得這個page也要include "base.php" 才有資料連結
$sql="update user set name='$name',addr='$addr',tel='$tel',birthday='$birthday',email='$email' where id='$id' ";
$pdo->exec($sql);
echo "<a href='member_center.php'>編輯完成，回會員中心</a>";

// 做完userlist，把edit.php Page改為導回member Page。還要到member 去做一個 會員列表的連結。
header("location:member_center.php");
//header("location:member_center.php");



//也可用header("location:member_center.php")導回memember page

?>