<?php

include_once('config.php');

$id = $_GET['q'];
$sql = "SELECT a.seats, a.price FROM tables a INNER JOIN table_bills b ON a.id = b.table_id INNER JOIN orders c ON c.id = b.orderid WHERE c.id =$id";
$result = $__conn->query($sql);
if ($result->num_rows > 0) {
    $count = 1;
    $data = "";
    while($row = $result->fetch_assoc()) {
        $data = $data . '<li id="" class="list-group-item d-flex justify-content-between lh-sm">
                        <div class="desc">
                        <h6 class="my-0">Table with '.$row["seats"].' seats</h6>
                        </div>
                        <span class="text-muted">$ '.$row["price"].' </span>
                        </li>';
        $total = $row["price"];
    }
    $data = $data . '<li class="list-group-item d-flex justify-content-between"><span>Total (USD)</span><strong id="bill">$' .$total. '</strong></li>';


    echo $data ;
}
?>