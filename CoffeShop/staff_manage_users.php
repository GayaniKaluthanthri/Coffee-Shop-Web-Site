<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Users</title>
    
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
                <h3 class="mb-3 page-title">Manage Users</h3>
                <a href="staff_add_users.php" class="btn card-btn mb-4"><i class="bi bi-person-plus-fill"></i> Add New
                    User</a>
                <div class="row">
                    <div class="col">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <!-- table headings -->
                                    <th scope="col">No</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">NIC No</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            $sql = "SELECT a.id, a.name, a.email, a.gender, a.mobile, a.nic, b.name AS role FROM users a INNER JOIN user_roles b ON a.role_id = b.id";
                            $result = $__conn->query($sql);
                            if ($result->num_rows > 0) {
                                $count = 1;
                                while($row = $result->fetch_assoc()) {
                                    echo '<tr> <th scope="row">'.$count.'</th>
                                    <td>'.$row['name'].'</td>
                                    <td>'.$row["email"].'</td>
                                    <td>'.$row["gender"].'</td>
                                    <td>'.$row["mobile"].'</td>
                                    <td>'.$row["nic"].'</td>
                                    <td>'.$row["role"].'</td>
                                    <td>
                                        <a class="action-btn" href="staff_edit_users.php?id='.$row['id'].'">
                                            <i class="bi bi-pencil"></i>
                                        </a> &nbsp;&nbsp;&nbsp;
                                        <a class="action-btn" href="database/staff_delete_user.php?id='.$row['id'].'"> 
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