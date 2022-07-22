<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Stock</title>

    <!-- attach header links -->
    <?php include('views/staff_header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<body id="staff" onload="timer()">

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

    function updateAmount(x) {
        swal({
            text: 'Enter new amount',
            content: "input",
            button: {
                text: "Update",
                closeModal: false,
            },
        }).then(name => {
            if (!name) throw null;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    swal("Amount updated!", "Amount updated successfully!", "success").then((value) => {
                        location.reload();
                    });
                }
            }
            xmlhttp.open("GET", "database/get_update_stock.php?id=" + x + "&qty=" + name, true);
            xmlhttp.send();
        });

    }

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
    </script>

    <!-- attach navigation file -->
    <?php include('views/staff_navigation.php'); ?>

    <!-- main section -->
    <div class="container f-sec">
        <div class="row pt-5">
            <div class="col-12">
                <h3 class="mb-3 page-title">Manage Stocks</h3>
                <a href="staff_add_ingredient.php" class="btn card-btn mb-4"><i class="bi bi-person-plus-fill"></i> Add
                    New
                    Ingredient</a>
                <div class="row">
                    <div class="col">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <!-- table headings -->
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $sql = "SELECT * FROM stock";
                            $result = $__conn->query($sql);
                            if ($result->num_rows > 0) {
                                $count = 1;
                                while($row = $result->fetch_assoc()) {
                                    echo '<tr> <th scope="row">'.$count.'</th>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row["qty"].  " ".$row["unit"].'</td>
                                    <td>
                                        <a class="action-btn" onclick="updateAmount('.$row['id'].')">
                                            
                                            <i class="bi bi-bag-plus"></i>
                                        </a> &nbsp;&nbsp;&nbsp;
                                        <a class="action-btn" href="staff_edit_ingredient.php?id='.$row['id'].'">
                                        <i class="bi bi-pencil"></i>
                                        </a> &nbsp;&nbsp;&nbsp;
                                        <a class="action-btn" href="database/staff_delete_stock.php?id='.$row['id'].'"> 
                                            <i class="bi bi-trash"></i>
                                        </a>
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

    <!-- footer section -->
    <?php include('views/footer.php'); ?>

    <!-- error message -->
    <script type="text/javascript">
    <?php echo $__page_error; ?>
    </script>

</body>

</html>