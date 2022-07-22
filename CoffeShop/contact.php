<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact Us</title>

    <!-- attach header links -->
    <?php include('views/header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>
</head>

<body id="index">

    <!-- attach navigation file -->
    <?php include('views/navigation.php'); ?>

    <!-- main section -->
    <div class="container contact">
        <div class="row">
            <div class="col-6">
                <div class="title">Get in Touch</div>
                <div class="desc">Java Lounge is yet another venture from the Sri Lankan entrepreneur and E-Commerce
                    Guru Dulith Herath.</div>
                <div class="desc">Java Lounge has grown strength to strength expanding our branches to Jawatta,
                    Bambalapitiya, Fort,
                    Barnes Place, W A D Ramanayake Mawatha and Nawala with ideas of expanding even further to ensure
                    that a
                    good quality cup of coffee is just within your reach.</div>
                <div class="desc"><i class="bi bi-telephone-fill"></i> 011-2556633</div>
                <div class="desc"><i class="bi bi-envelope-fill"></i> info@javalounge.lk</div>
                <div class="sub-title">SOCIAL</div>
                <div class="icons d-flex">
                    <div class="icon"><a href="https://www.facebook.com/javaloungelk/"><i
                                class="bi bi-facebook"></i></a></div>
                    <div class="icon"><a href="https://www.instagram.com/javaloungecolombo/"><i
                                class="bi bi-instagram"></i></a></div>
                </div>
            </div>
            <div class="col-6">
                <form action="database/customer.php" method="post" onsubmit="return validate_user_details()">
                    <label for="name" class="form-label">Your Name (Required)</label>
                    <input type="text" class="form-control" id="name" name="name">
                    <label for="email" class="form-label">Your Email (Required)</label>
                    <input type="text" class="form-control" id="email" name="email">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea name="message" id="message" cols="30" rows="3"></textarea>
                    <input type="submit" value="submit">
                </form>
            </div>
        </div>
    </div>

    <!-- external javascript functions -->
    <script type="text/javascript" src="js/customer_validations.js"></script>

    <!-- footer section -->
    <?php include('views/footer.php'); ?>
    
    <!-- error message -->
    <script type="text/javascript">
    <?php echo $__page_error; ?>
    </script>
</body>

</html>