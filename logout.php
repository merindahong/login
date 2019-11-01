<?php

setcookie("login", "", time()-3600);
setcookie("id", "", time()-3600);
header("location:index.php" );

//因為原先設 3600秒，登出要 -3600秒


?>