<?php

include_once('database/config.php');

if(array_key_exists('coffee_checkout',$_POST)){
    $itemCount = $_POST['itemCount'];
    $price = $_POST['price'];
    $firstname = $_POST['firstName'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $email = $_POST['email'];

    $sql = "SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'orders' AND table_schema = DATABASE();";
    $result = $__conn->query($sql);
    $increment;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc() ;
        $increment = $row['AUTO_INCREMENT'];
    }
    $sql = "INSERT INTO orders VALUES('$increment', '$firstname','$email', '$address', '$address2', '1', DEFAULT, 0)";
    $__conn->query($sql);
    for($i = 1; $i <= $itemCount; $i++){
        $itemId = $_POST['itemId_' . $i];
        $itemQty = $_POST['itemCount_' . $i];
        $sql = "INSERT INTO coffee_bills VALUES(NULL, '$increment','$itemId', '$itemQty')";
        $__conn->query($sql);
    }
}

if(array_key_exists('table_checkout',$_POST)){
    $price = $_POST['price'];
    $seats = $_POST['seats'];
    $firstname = $_POST['firstName'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $email = $_POST['email'];

    $sql = "SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'orders' AND table_schema = DATABASE();";
    $result = $__conn->query($sql);
    $increment;
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc() ;
        $increment = $row['AUTO_INCREMENT'];
    }
    
    $sql = "SELECT * FROM tables WHERE seats=$seats AND state=1";
    echo $sql;
    $result = $__conn->query($sql);
   
    $table_id = "";
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc() ;
       $table_id = $row['id'];
    }
    $sql = "UPDATE tables SET state=0 WHERE id=$table_id";
    $__conn->query($sql);
    $sql = "INSERT INTO orders VALUES('$increment', '$firstname','$email', '$address', '$address2', '2', DEFAULT, 0)";
    $__conn->query($sql);
    $sql = "INSERT INTO table_bills VALUES(NULL, '$increment', '$table_id',0)";
    $__conn->query($sql);
}


header("location:index.php");
?>