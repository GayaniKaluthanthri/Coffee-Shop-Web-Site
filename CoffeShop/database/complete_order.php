<?php

include_once('config.php');

$id = $_GET['q'];
$sql = "SELECT * FROM orders WHERE id=$id";
$result = $__conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if($row['type'] == '2'){
        $sql1 = "SELECT * FROM table_bills WHERE orderid=$id";
        $result1 = $__conn->query($sql1);
        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
            $sql = "UPDATE tables SET state=1 WHERE id=".$row1['table_id'];
            if ($__conn->query($sql) === TRUE) {
                $sql = "UPDATE orders SET status=1 WHERE id=$id";
                if ($__conn->query($sql) === TRUE) {
                    echo "done";
                } else {
                    echo "error";
                }
            }
        }
    } else {
        $sql = "UPDATE orders SET status=1 WHERE id=$id";
        if ($__conn->query($sql) === TRUE) {
            echo "done";
        } else {
            echo "error";
        }
    }
}





?>