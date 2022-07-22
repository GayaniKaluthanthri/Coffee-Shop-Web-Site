<?php

include_once('config.php');

$sql = "SELECT count(*) AS count FROM orders WHERE status=0";
$result = $__conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row["count"];
}
?>