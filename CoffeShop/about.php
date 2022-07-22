<!DOCTYPE html>
<html lang="en">

<head>
    <title>About Us</title>

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
                <div class="jumb2">
                    <div>

                        <h1>About JAVA Lounge</h1>
                        
                        <img src="img/title-bar-bottom.png" alt="" class="title_bar">
                        
                        <div class="x3"></div>
                        <img src="img/img-1.png" alt="" class="img_bar">
                        <div class="x3"></div>
                        <p>Java Lounge Colombo is one of the oldest coffee houses in Sri Lanka. Java is well known for
                            emphasizing on serving quality coffee all the time. We currently have around 7 branches and
                            is growing rapidly.</p>
                        <div class="x6"></div>
                        <h1>Our Coffee Story</h1>
                        <img src="img/title-bar-bottom.png" alt="" class="title_bar">
                        <div class="x3"></div>
                        <img src="img/img-2.png" alt="" class="img_bar">
                        <div class="x3"></div>
                        <p>Java Lounge is yet another venture from the Sri Lankan entrepreneur and E-Commerce Guru
                            Dulith Herath. Java Lounge came into existence mainly because of his addiction to coffee,
                            any workaholic would agree and bear witness to a condition called “Procaffeinating” the
                            tendency to not start anything without a cup of coffee.</p>
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