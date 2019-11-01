
<?php

session_start();
unset($_SESSION["login"]);
unset($_SESSION["id"]);
// $_SESSION["login"]=null; 不要用此法，

// CCC 登出之後，把SESSION移除，再導到index
header("location:index.php");


?>

