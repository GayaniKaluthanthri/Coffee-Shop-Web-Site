<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Login</title>

    <!-- attach header links -->
    <?php include('views/header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<?php 
$_email = $_password = $__page_error = "";
if (array_key_exists('user_login', $_POST)){
    $_email = $_POST["email"];
    $_password = $_POST["password"];
    $enc_password = md5($_password);
    $sql = "SELECT * FROM users WHERE email='$_email'";
    $result = $__conn->query($sql);
    if ($result->num_rows == 0) {
        $__page_error = 'swal("Unregistered Email", "'.$_email.' haven\'t registerd in the system. Enter a registerd email to continue", "error");';
    } else{
        $sql = "SELECT * FROM users WHERE email='$_email' AND password='$enc_password'";
        $result = $__conn->query($sql);
        if ($result->num_rows == 0) {
            $__page_error = 'swal("Invalid Password", "You enterd an invalid password. Enter your correct password for '.$_email.' to continue", "error");';
        } else {
            $row = $result->fetch_assoc();
            $_SESSION["_auth_"] = "true";
            $_SESSION["_roleid_"] = $row['role_id'];
            $_SESSION["_email_"] = $_email;
            $_SESSION["_username_"] = $row['name'];
            $_SESSION["_userid_"] = $row['id'];
            $_email = $_password = "";
            header('location:staff_home.php');
        }
    }  
} 
?>

<body id="index">

    <!-- internal javascript functions -->
    <script type="text/javascript">
    function va_email() {
        var email = document.getElementById('email').value;
        if (email === "") {
            swal("Empty field", "Enter your login crediecials to login to the system", "error");
            return false;
        }
        const pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!(pattern.test(email))) {
            swal("Invalid field", email + " is not an valid email address. Enter a valid email address", "error");
            return false;
        }
        var password = document.getElementById('password').value;
        if (password === "") {
            swal("Empty field", "Enter your login crediecials to login to the system", "error");
            return false;
        }
        return true;
    }
    </script>

    <!-- main section -->
    <div class="auth-wrap">
        <div class="login-wrap">
            <div class="container">
                <div class="text-center my-3">
                    <img src="img/logo.png" alt="logo" class="brand-img">
                    <h2><a href="index.php">Java Lounge</a></h2>
                    <h5>Staff Login</h5>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                    onsubmit="return va_email()" autocomplete="off" class="login-form">
                    <hr>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address"
                            value="<?php echo $_email; ?>">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            autocomplete="new-password">
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 flexCheckDefault">
                            <input class="form-check-input" type="checkbox" value="" id=""> Remember Me
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-login" name="user_login">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- error message -->
    <script type="text/javascript">
    <?php echo $__page_error; ?>
    </script>

</body>

</html>