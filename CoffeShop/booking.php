<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking</title>

    <!-- attach header links -->
    <?php include('views/header.php'); ?>

    <!-- connect to database -->
    <?php include_once('database/config.php'); ?>
</head>

<body id="index">

    <!-- attach navigation file -->
    <?php include('views/navigation.php'); ?>

    <!-- main section -->
    <div id="booking" class="container">

        <!-- Modal -->
        <div class="modal fade" id="cartModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-cart"></i> Your Cart</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul id="cart_wrap" class="list-group mb-3">
                            <!-- js rendaring -->
                        </ul>
                        <hr class="my-4">
                        <div class="row g-3 payment-form" id="payment-form">
                            <form id="cart_form" action="checkout.php" method="post"
                                onsubmit="return return validate_cart_details()">
                                <div class="col-12 mt-1">
                                    <label for="firstName" class="form-label">Full name</label>
                                    <input type="text" class="form-control" id="fullname" name="firstName"
                                        placeholder="Jhon Wick" value="" required="">
                                </div>
                                <div class="col-12 mt-1">
                                    <label for="email" class="form-label">Email <span
                                            class="text-muted">(Optional)</span></label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="john@example.com">
                                </div>
                                <div class="col-12 mt-1">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="1234 Main St" required="">
                                </div>
                                <div class="col-12 mt-1">
                                    <label for="address2" class="form-label">Address 2 <span
                                            class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="address2" name="address2"
                                        placeholder="Apartment or suite">
                                </div>
                                <div id="js_gen"></div>
                            </form>
                        </div>
                        <hr class="mb-2 mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <input type="text" class="form-control" id="cc-name" placeholder="M T M Disanayake"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <input type="text" class="form-control" id="cc-number" placeholder="4444333322221111"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <input type="text" class="form-control" id="cc-expiration" placeholder="03/01 (MM/YY)"
                                    required="">
                            </div>
                            <div class="col-md-6">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cc-cvv" placeholder="444" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="checkout()" class="btn btn-jumb">Checkout</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
        function checkout() {
            var form = document.getElementById('cart_form');
            var price = document.getElementById('cart_total');
            var bill = document.getElementById('bill').innerHTML;
            price.value = bill.replace("$", "");
            if (validate_cart_details()) {
                form.submit();
            }
        }

        function show_cart(x) {
            var form = document.getElementById('cart_wrap');
            var wrap = document.getElementById('cart_form');
            var seats = document.getElementById('seats_count_' + x).innerHTML;
            var price = document.getElementById('price_count_' + x).innerHTML;

            form.innerHTML =
                '<li id="" class="list-group-item d-flex justify-content-between lh-sm"><div class="desc"><h6 class="my-0">Table with ' +
                seats + ' seats</h6><small class="text-muted"></small></div> <span class="text-muted">$ ' + price +
                '</span></li>';
            form.innerHTML = form.innerHTML +
                '<li class="list-group-item d-flex justify-content-between"><span>Total (USD)</span><strong id="bill">$' +
                price + '</strong></li>';
            wrap.innerHTML = wrap.innerHTML + '<input type="hidden" name="price" id="cart_total">';
            wrap.innerHTML = wrap.innerHTML + '<input type="hidden" name="table_checkout">';
            wrap.innerHTML = wrap.innerHTML + '<input type="hidden" name="seats" id="cart_seats" value="' + seats +
                '">';
            var myModal = new bootstrap.Modal(document.getElementById('cartModel'), {
                keyboard: false
            });
            myModal.show();
        }
        </script>


        <div class="row">
            <div class="col-12">
                <img src="img/title-bar-top-1.png" alt="" class="title_bar">
                <h2>Book a table & Be with your colleagues</h2>
                <img src="img/title-bar-bottom-1.png" alt="" class="title_bar">
                <div class="x2"></div>
                <p>Book a table for your coleguies to be together. There are 3 types of tables. You are free to choose
                    any as your need.</p>
            </div>
            <?php 
                $sql = "SELECT id, seats, price, image, state, COUNT(*) AS count FROM tables GROUP BY seats";
                $result = $__conn->query($sql);
                if ($result->num_rows > 0) {
                    $count = 1;
                    while($row = $result->fetch_assoc()) {
                        echo'<div class="col-12 col-md-6 col-lg-4 mb-4">
                        <div class="table-card">
                            <img src="uploads/tables/'.$row['image'].'" alt="" class="tables">
                            <div class="desc">
                                <ul>
                                    <li><span id="seats_count_'.$count.'">'.$row['seats'].'</span> Seats</li>
                                    <li>$ <span id="price_count_'.$count.'">'.$row['price'].'</span> USD</li>';
                                    $sql1 = "SELECT COUNT(*) AS cnt FROM tables WHERE seats=" . $row['seats'] ." AND state=1";
                                $result1 = $__conn->query($sql1);
                                $row1 = $result1->fetch_assoc();
                                    echo'<li>'.$row1['cnt'].' Availabile</li>
                                </ul>';
                                if($row1['cnt'] > 0){
                                    echo '<a type="button" onclick="show_cart('.$count.')" class="btn btn-jumb btn-lg px-4"><i
                                    class="bi bi-bookmarks"></i>
                                    &nbsp;Book Table</a>';
                                } else {
                                    echo '<a type="button" class="btn btn-jumb-n btn-lg px-4"><i
                                    class="bi bi-bookmarks"></i>
                                    &nbsp;Unavailable</a>';
                                }
                            echo '</div>
                        </div>
                    </div>';
                        $count++;
                    }
                }
            ?>
        </div>
    </div>

    <div class="x6"></div>

    <!-- external javascript functions -->
    <script type="text/javascript" src="js/cart_validation.js"></script>

    <!-- footer section -->
    <?php include('views/footer.php'); ?>

    <!-- error message -->
    <script type="text/javascript">
    <?php echo $__page_error; ?>
    </script>

</body>

</html>