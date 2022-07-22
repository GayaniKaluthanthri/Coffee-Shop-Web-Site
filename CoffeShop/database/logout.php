<!-- start session -->
<?php 
$__isLogged = 'false';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    session_destroy();
    header("location: ../index.php");
} 