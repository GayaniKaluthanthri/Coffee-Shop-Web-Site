<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Edit Users</title>

    <!-- attach header links -->
    <?php include('views/staff_header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<body id="staff">

    <?php 
    if(array_key_exists('user_update',$_POST)){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $nic = $_POST['nic'];
        $id = $_POST['id'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $sql = "UPDATE users SET name='$fullname',email='$email',gender='$gender',mobile='$mobile',nic='$nic',role_id='$role' WHERE id=$id";
        if ($__conn->query($sql) === TRUE) {
            $__page_error = 'swal("Data Update Successfully", "User updated successfully", "success")
            .then((value) => {
                window.location = "staff_manage_users.php";
            }); ';
        } else {
            $__page_error = 'swal("Data Update Failed", "There is a problem with data update. Contact system admin", "error");';
        }
    }
    $fullname = $email = $role = $nic = $mobile = $gender = "";
    
    if(array_key_exists('id',$_GET) || array_key_exists('id',$_POST)){
        $id = "";
        if(array_key_exists('id',$_GET)){
            $id = $_GET['id'];
        } else {
            $id = $_POST['id'];
        }
        $sql = "SELECT * FROM users WHERE id=" . $id;
        $result = $__conn->query($sql);
        if ($result->num_rows == 0) {
            $__page_error = "Password is incorrect";
        } else {
            $row = $result->fetch_assoc();
            $fullname = $row['name'];
            $email = $row['email'];
            $role = $row['role_id'];
            $nic = $row['nic'];
            $mobile = $row['mobile'];
            $gender = $row['gender'];
        }   
    }
    ?>

    <!-- attach navigation file -->
    <?php include('views/staff_navigation.php'); ?>

    <!-- main section -->
    <div class="container f-sec">
        <div class="row pt-5">
            <div class="col-12 frame">
                <div class="head-part">
                    <a href="staff_manage_users.php" class="btn card-btn mb-4"><i class="bi bi-caret-left-fill"></i>
                        Back</a>
                    <span class="mb-3 page-title">Edit Users</span>
                </div>
                <div class="row">
                    <div class="col">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                            onsubmit="return validate_user_details(2)" autocomplete="off">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            placeholder="John Wick" value="<?php echo $fullname ;?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select" aria-label="Default select example" name="role"
                                            id="role">
                                            <?php if($role != 1){?>
                                            <option <?php echo ($role == '2') ? "selected " : "" ;?> value="2">Kitchen
                                                Staff</option>
                                            <option <?php echo ($role == '3') ? "selected " : "" ;?> value="3">Cashier
                                            </option>
                                            <option <?php echo ($role == '4') ? "selected " : "" ;?> value="4">Cleaning
                                                Staff</option>
                                            <option <?php echo ($role == '5') ? "selected " : "" ;?> value="5">Waiter
                                            </option>
                                            <?php } else { ?>
                                            <option <?php echo ($role == '1') ? "selected " : "" ;?> value="1">Manager
                                            </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" id="gender" name="gender">
                                            <option <?php echo ($gender == 'Male') ? "selected " : "" ;?> value="Male">
                                                Male</option>
                                            <option <?php echo ($gender == 'Female') ? "selected " : "" ;?>
                                                value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="example@gmail.com" value="<?php echo $email ;?>">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nic" class="form-label">NIC Number</label>
                                        <input type="text" class="form-control" id="nic" name="nic"
                                            placeholder="200030100533" value="<?php echo $nic ;?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            placeholder="0764523412" value="<?php echo $mobile ;?>">
                                    </div>
                                </div>
                                <?php 
                                if(array_key_exists('id',$_GET)){
                                    echo '<input type="hidden" name="id" value="'.$_GET["id"].'">';
                                } else if(array_key_exists('id',$_POST)){
                                    echo '<input type="hidden" name="id" value="'.$_POST["id"].'">';
                                }
                                ?>
                                <div class="col-12" style="display:flex;justify-content:right;">
                                    <button type="submit" class="btn card-btn" name="user_update">
                                        <i class="bi bi-person-plus-fill"></i> Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="x6"></div>

    <!-- external javascript functions -->
    <script type="text/javascript" src="js/staff_user_validations.js"></script>

    <!-- footer section -->
    <?php include('views/footer.php'); ?>

    <!-- error message -->
    <script type="text/javascript">
    <?php echo $__page_error; ?>
    </script>

</body>

</html>