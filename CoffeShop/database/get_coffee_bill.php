<?php

include_once('config.php');

$id = $_GET['q'];
$sql = "SELECT a.name, b.qty, (a.price * b.qty) AS price FROM coffees a INNER JOIN coffee_bills b ON b.itemID = a.id WHERE b.orderId =$id";
$result = $__conn->query($sql);
if ($result->num_rows > 0) {
    $count = 1;
    $data = "";
    $total = 0;
    while($row = $result->fetch_assoc()) {
        $data = $data . '<li id="" class="list-group-item d-flex justify-content-between lh-sm">
                        <div class="desc">
                        <h6 class="my-0">'.$row["name"].'</h6>
                        <small class="text-muted">Amount : '.$row["qty"].'</small>
                        </div>
                        <span class="text-muted">$ '.$row["price"].' </span>
                        </li>';
        $total = $row["price"];
    }
    
    $data = $data . '<li class="list-group-item d-flex justify-content-between"><span>Total (USD)</span><strong id="bill">$' .$total. '</strong></li>';


    echo $data ;
}
?>