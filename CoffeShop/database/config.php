<?php
$__servername = "localhost";
$__username = "root";
$__password = "";
$__dbname = "test_coffee_shop";
$__page_error = "";
// Create connection
try {
  $__conn = new mysqli($__servername, $__username, $__password, $__dbname);
}
catch (mysqli_sql_exception $__e) {
    $_redtitle = 'Database Not Connected'; 
    $_redmsg = 'This happend sometime when server is down or database is not operational.'; 
    header("location:./redirect.php?title=$_redtitle&msg=$_redmsg");
    return;
}
?> 