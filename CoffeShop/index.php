<!DOCTYPE html>
<html lang="en">

<head>
    <title>Java Lounge Colombo</title>

    <!-- attach header links -->
    <?php include('views/header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>

</head>

<body id="index">

    <!-- attach navigation file -->
    <?php include('views/navigation.php'); ?>

    <!-- main section -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="jumb">
                    <div>
                    
                        <img src="img/title-bar-top.png" alt="" class="title_bar">
                        <h1>Life is better with a good coffee</h1>
                        <img src="img/title-bar-bottom.png" alt="" class="title_bar">
                        <div class="x3"></div>
                        <p>We are coffee punks who don’t exaggerate about their Americanos. Time, temperature, and
                            technique
                            need to be on point to make the best cup of coffee, but it’s all for nothing without quality
                            beans roasted to perfection. </p>
                            <div class="x3"></div>
                        <img src="img/img-3.png" alt="" class="img_bar">
                        <div class="x3"></div>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <a type="button" href="booking.php" class="btn btn-jumb btn-lg px-4 gap-3"><i
                                    class="bi bi-bookmarks"></i>
                                &nbsp;Book Online</a>
                            <a type="button" href="menu.php" class="btn btn-jumb-1 btn-lg px-4"><i
                                    class="bi bi-box-seam"></i>
                                &nbsp;Order Online</a>
                        </div>
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