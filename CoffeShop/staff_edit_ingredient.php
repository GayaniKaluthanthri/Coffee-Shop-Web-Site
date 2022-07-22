<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Edit Ingredients</title>

    <!-- attach header links -->
    <?php include('views/staff_header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<body id="staff">

    <?php 
    if(array_key_exists('stock_update',$_POST)){
        $id = "";
        if(array_key_exists('id',$_GET)){
            $id = $_GET['id'];
        } else {
            $id = $_POST['id'];
        }
        $fullname = $_POST['fullname'];
        $qty = $_POST['quantity'];
        $unit = $_POST['unit'];
        $sql = "UPDATE stock SET name='$fullname', qty='$qty', unit='$unit' WHERE id=$id";
        if ($__conn->query($sql) === TRUE) {
            $__page_error = 'swal("Data Update Successfully", "Stock updated successfully", "success")
            .then((value) => {
                window.location = "staff_manage_stock.php";
            }); ';
        } else {
            $__page_error = 'swal("Data Update Failed", "There is a problem with data update. Contact system admin", "error");';
        }
    }
    $fullname = $qty = $unit = "";
    if(array_key_exists('id',$_GET) || array_key_exists('id',$_POST)){
        $id = "";
        if(array_key_exists('id',$_GET)){
            $id = $_GET['id'];
        } else {
            $id = $_POST['id'];
        }
        $sql = "SELECT * FROM stock WHERE id=" . $id;
        $result = $__conn->query($sql);
        if ($result->num_rows == 0) {
            $__page_error = "Password is incorrect";
        } else {
            $row = $result->fetch_assoc();
            $fullname = $row['name'];
            $qty = $row['qty'];
            $unit = $row['unit'];
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
                    <span class="mb-3 page-title">Edit Ingredient</span>
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
                                            placeholder="Black Coffee Powder" value="<?php echo $fullname ;?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="unit" class="form-label">Unit</label>
                                        <select class="form-select" aria-label="Default select example" id="unit"
                                            name="unit">
                                            <option <?php echo ($unit == 'Kilo Gram') ? "selected " : "" ;?>
                                                value="Kilo Gram">Kilo Gram</option>
                                            <option <?php echo ($unit == 'Letre') ? "selected " : "" ;?> value="Letre">
                                                Letre</option>
                                            <option <?php echo ($unit == 'Cups') ? "selected " : "" ;?> value="Cups">
                                                Cups</option>
                                            <option <?php echo ($unit == 'Sacks') ? "selected " : "" ;?> value="Sacks">
                                                Sacks</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="text" class="form-control" id="quantity" name="quantity"
                                            placeholder="2" value="<?php echo $qty ;?>">
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
                                    <button type="submit" class="btn card-btn" name="stock_update">
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