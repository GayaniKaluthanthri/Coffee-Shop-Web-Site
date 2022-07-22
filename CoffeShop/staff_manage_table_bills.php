<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Table Bills</title>

    <!-- attach header links -->
    <?php include('views/staff_header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<body id="staff">

    <!-- attach navigation file -->
    <?php include('views/staff_navigation.php'); ?>

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

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- inline javascript functions -->
    <script type="text/javascript">
    function showModel(id) {
        if (id.length == 0) {
            document.getElementById('cart_wrap').innerHTML = '';
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('cart_wrap').innerHTML = this.responseText;
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
    </script>

    <!-- main section -->
    <div class="container f-sec">
        <div class="row pt-5">
            <div class="col-12">
                <h3 class="mb-3 page-title">View Pending Table Bills</h3>
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
                                        <a class="action-btn" onclick="showModel('.$row["id"].')">
                                            <i class="bi bi-file-text"></i>
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
            <div class="col-12 mt-4">
                <h3 class="mb-3 page-title">View Completed Table Bills</h3>
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
                            $sql = "SELECT * FROM orders WHERE type=2 AND status=1";
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

    <div class="x6"></div>

    <!-- footer section -->
    <?php include('views/footer.php'); ?>

    <!-- error message -->
    <script type="text/javascript">
    <?php echo $__page_error; ?>
    </script>

</body>

</html>