<?php
include_once('config.php');

if (array_key_exists('id', $_GET)){
    $_id = $_GET["id"];
    $_qty = $_GET["qty"];
    $sql = "SELECT * FROM stock WHERE id=" . $_id;
    $result = $__conn->query($sql);
    if ($result->num_rows == 1 ) {
        $sql = "UPDATE stock SET qty=$_qty WHERE id=" . $_id;
        if ($__conn->query($sql) === TRUE) {
            echo 'done';
        } else {
            echo '';
        }
    }  
}
?>