<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Customers</title>
    
    <!-- attach header links -->
    <?php include('views/staff_header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>
</head>

<body id="staff">

    <!-- inline javascript functions -->
    <script type="text/javascript">
    </script>

    <!-- attach navigation file -->
    <?php include('views/staff_navigation.php'); ?>

    <!-- main section -->
    <div class="container f-sec">
        <div class="row pt-5">
            <div class="col-12">
                <h3 class="mb-3 page-title">View Customer Messages</h3>
                <div class="row">
                    <div class="col">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <!-- table headings -->
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $sql = "SELECT * FROM customers";
                            $result = $__conn->query($sql);
                            if ($result->num_rows > 0) {
                                $count = 1;
                                while($row = $result->fetch_assoc()) {
                                    echo '<tr> <th scope="row">'.$count.'</th>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["subject"].'</td>
                                    <td>'.$row["message"].'</td>
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