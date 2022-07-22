<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Add Ingredients</title>

    <!-- attach header links -->
    <?php include('views/staff_header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<body id="staff">

    <?php 
    if(array_key_exists('user_registration',$_POST)){
        $fullname = $_POST['fullname'];
        $qty = $_POST['quantity'];
        $unit = $_POST['unit'];
        $sql = "INSERT INTO stock VALUES(NULL,'$fullname','$qty','$unit')";
        if ($__conn->query($sql) === TRUE) {
            $__page_error = 'swal("Data Insert Successfully", "Ingredient added successfully", "success")
            .then((value) => {
                window.location = "staff_manage_stock.php";
            }); ';
        } else {
            $__page_error = 'swal("Data Insert Failed", "There is a problem with data insertation. Contact system admin", "error");';
        }
    }
    ?>

    <!-- attach navigation file -->
    <?php include('views/staff_navigation.php'); ?>

    <!-- main section -->
    <div class="container">
        <div class="row pt-5">
            <div class="col-12 frame">
                <div class="head-part">
                    <a href="staff_manage_stock.php" class="btn card-btn mb-4"><i class="bi bi-caret-left-fill"></i>
                        Back</a>
                    <span class="mb-3 page-title">Add Ingredient</span>
                </div>
                <div class="row">
                    <div class="col">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
                            onsubmit="return validate_user_details(1)" autocomplete="off">
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="fullname" class="form-label">Ingredient Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname"
                                            placeholder="Black Coffee Powder">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="unit" class="form-label">Unit</label>
                                        <select class="form-select" aria-label="Default select example" id="unit"
                                            name="unit">
                                            <option value="Kilo Gram">Kilo Gram</option>
                                            <option value="Letre">Letre</option>
                                            <option value="Cups">Cups</option>
                                            <option value="Sacks">Sacks</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity"
                                            placeholder="2">
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