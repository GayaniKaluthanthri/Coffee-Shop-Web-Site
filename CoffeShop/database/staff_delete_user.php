<?php
include_once('config.php');

if (array_key_exists('id', $_GET)){
    $_id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE id=" . $_id;
    $result = $__conn->query($sql);
    if ($result->num_rows == 1 ) {
        $sql = "DELETE FROM users WHERE id=" . $_id;
        if ($__conn->query($sql) === TRUE) {
            header("location:../staff_manage_users.php");
        } else {
            echo '';
        }
    }  
}
?>