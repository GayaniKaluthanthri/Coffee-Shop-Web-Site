<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Add Users</title>

    <!-- attach header links -->
    <?php include('views/staff_header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<body id="staff">

    <?php 
    if(array_key_exists('user_registration',$_POST)){
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = ($role == '3') ? md5($_POST['password']) : "" ;
        $nic = $_POST['nic'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $sql = "INSERT INTO users VALUES(NULL,'$fullname','$email','$password','$gender','$mobile','$nic','$role')";
        if ($__conn->query($sql) === TRUE) {
            $__page_error = 'swal("Data Insert Successfully", "User created successfully", "success")
            .then((value) => {
                window.location = "staff_manage_users.php";
            }); ';
        } else {
            $__page_error = 'swal("Data Insert Failed", "There is a problem with data insertation. Contact system admin", "error");';
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
                    <span class="mb-3 page-title">Add Users</span>
                </div>
                <div class="row">
                    <div class="col">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                            onsubmit="return validate_user_details(1)" autocomplete="off">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            placeholder="John Wick">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select" aria-label="Default select example" name="role"
                                            id="role">
                                            <option value="2">Kitchen Staff</option>
                                            <option value="3">Cashier</option>
                                            <option value="4">Cleaning Staff</option>
                                            <option value="5">Waiter</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender</label>
                                        <select class="form-select" aria-label="Default select example" id="gender"
                                            name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="example@gmail.com">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="************" autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword"
                                            name="confirmPassword" placeholder="************">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="nic" class="form-label">NIC Number</label>
                                        <input type="text" class="form-control" id="nic" name="nic"
                                            placeholder="200030100533">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            placeholder="0764523412">
                                    </div>
                                </div>
                                <div class="col-12" style="display:flex;justify-content:right;">
                                    <button type="submit" class="btn card-btn" name="user_registration">
                                        <i class="bi bi-person-plus-fill"></i> Add
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