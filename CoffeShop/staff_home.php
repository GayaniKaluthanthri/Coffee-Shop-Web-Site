<!DOCTYPE html>
<html lang="en">

<head>
    <title>Staff Home</title>

    <!-- attach header links -->
    <?php include('views/staff_header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<body id="staff" onload="timer()">

    <!-- attach navigation file -->
    <?php include('views/staff_navigation.php'); ?>

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

    </script>

    <!-- main section -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumb">
                    <div>
                        <img src="img/title-bar-top.png" alt="" class="title_bar">
                        <h1>Life is better with a good coffee</h1>
                        <img src="img/title-bar-bottom.png" alt="" class="title_bar">
                        <div class="x6"></div>
                        <p>We are coffee punks who don’t exaggerate about their Americanos. Time, temperature, and
                            technique
                            need to be on point to make the best cup of coffee, but it’s all for nothing without quality
                            beans roasted to perfection. </p>
                        <div class="x6"></div>
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