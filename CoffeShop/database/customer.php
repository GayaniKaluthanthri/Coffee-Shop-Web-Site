<?php

include_once('config.php');

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO customers VALUES (NULL,'$name','$email','$subject','$message')";
if ($__conn->query($sql) === TRUE) {
    echo "done";
} else {
    echo "error";
}
header("location:../index.php");
?>