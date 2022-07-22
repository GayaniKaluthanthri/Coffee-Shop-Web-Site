<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Orders</title>

    <!-- attach header links -->
    <?php include('views/staff_header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<body id="staff" onload="timer()">

    <!-- Modal -->
    <div class="modal fade" id="cartModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-cart"></i> Customer Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul id="cart_wrap" class="list-group mb-3">
                        <!-- js rendaring -->
                    </ul>
                </div>
                <div class="modal-footer">
                    <form id="cart_form" action="database/complete_order.php" method="post" onsubmit="return true">
                        <div class="form-check">
                            <input type="hidden" name="id" id="order_id">
                            <input class="form-check-input" type="checkbox" value="" id="confirm">
                            <label class="form-check-label" for="confirm">Customer has paid whole amount and staff has
                                completed the order</label>
                        </div>
                    </form>

                    <button type="button" onclick="complete()" class="btn btn-jumb">Complete Order</button>
                </div>
            </div>
        </div>
    </div>

    <!-- internal javascript functions -->
    <script type="text/javascript">
    function timer() {
        if (document.getElementById('order_count_notify') != null) {
            checkOrders();
            setInterval(checkOrders, 60000);
        }
    }

    function checkOrders() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('order_count_notify').innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "database/get_order_count.php", true);
        xmlhttp.send();
    }

    function showModel(id) {
        if (id.length == 0) {
            document.getElementById('cart_wrap').innerHTML = '';
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('cart_wrap').innerHTML = this.responseText;
                    document.getElementById('order_id').value = id;
                    var myModal = new bootstrap.Modal(document.getElementById('cartModel'), {
                        keyboard: false
                    });
                    myModal.show();
                }
            }
            xmlhttp.open("GET", "database/get_coffee_bill.php?q=" + id, true);
            xmlhttp.send();
        }
    }

    function showModel_2(id) {
        if (id.length == 0) {
            document.getElementById('cart_wrap').innerHTML = '';
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('cart_wrap').innerHTML = this.responseText;
                    document.getElementById('order_id').value = id;
                    var myModal = new bootstrap.Modal(document.getElementById('cartModel'), {
                        keyboard: false
                    });
                    myModal.show();
                }
            }
            xmlhttp.open("GET", "database/get_table_bill.php?q=" + id, true);
            xmlhttp.send();
        }
    }

    function complete() {
        var confirm = document.getElementById('confirm').checked;
        if (confirm) {
            var id = document.getElementById('order_id').value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var myModalEl = document.getElementById('cartModel');
                    var modal = bootstrap.Modal.getInstance(myModalEl);
                    modal.hide();
                    swal("Order Completed", "Customer order has been compleated successfully", "info")
                        .then((value) => {
                            location.reload();
                        });
                }
            }
        }
        xmlhttp.open("GET", "database/complete_order.php?q=" + id, true);
        xmlhttp.send();
    }
    </script>

    <!-- attach navigation file -->
    <?php include('views/staff_navigation.php'); ?>

    <!-- main section -->
    <div class="container f-sec">
        <div class="row pt-5">
            <div class="col-12">
                <h3 class="mb-3 page-title">Manage Pending Coffee Orders</h3>
                <div class="row">
                    <div class="col">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <!-- table headings -->
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $sql = "SELECT * FROM orders WHERE type=1 AND status=0";
                            $result = $__conn->query($sql);
                            if ($result->num_rows > 0) {
                                $count = 1;
                                while($row = $result->fetch_assoc()) {
                                    echo '<tr> <th scope="row">'.$count.'</th>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["address"] .', ' . $row["address2"] .'</td>
                                    <td>'.$row["date"].'</td>
                                    <td>
                                        <a class="action-btn" onclick="showModel('.$row["id"].')">
                                            <i class="bi bi-file-text"></i>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    </tr>';
                                    $count++;
                                }
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <h3 class="mb-3 page-title">Manage Pending Table Orders</h3>
                <div class="row">
                    <div class="col">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <!-- table headings -->
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $sql = "SELECT * FROM orders WHERE type=2 AND status=0";
                            $result = $__conn->query($sql);
                            if ($result->num_rows > 0) {
                                $count = 1;
                                while($row = $result->fetch_assoc()) {
                                    echo '<tr> <th scope="row">'.$count.'</th>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["address"] .', ' . $row["address2"] .'</td>
                                    <td>'.$row["date"].'</td>
                                    <td>
                                        <a class="action-btn" onclick="showModel_2('.$row["id"].')">
                                            <i class="bi bi-file-text"></i>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;
                                    </td>
                                    </tr>';
                                    $count++;
                                }
                            }
                        ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="x6"></div>

    <!-- footer section -->
    <?php include('views/footer.php'); ?>

    <!-- error message -->
    <script type="text/javascript">
    <?php echo $__page_error; ?>
    </script>

</body>

</html>