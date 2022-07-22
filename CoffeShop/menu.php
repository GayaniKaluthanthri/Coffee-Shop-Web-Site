<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu</title>

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
        <div class="row">
            <div class="col-12">
                <img src="img/title-bar-top-1.png" alt="" class="title_bar">
                <h2>Choose Your Taste</h2>
                <img src="img/title-bar-bottom-1.png" alt="" class="title_bar">
                <div class="x2"></div>
                <p>Book a table for your coleguies to be together. There are 3 types of tables. You are free to choose
                    any as your need.</p>
            </div>
            <div class="col-12">
                <a type="button" onclick="show_cart()" class="btn btn-jumb-1  px-4"><i class="bi bi-cart"></i>
                    &nbsp;View Your Cart</a>
            </div>

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
                                <form id="cart_form" action="checkout.php" method="post" onsubmit="return validate_cart_details()">
                                    <div class="col-12 mt-1">
                                        <label for="fullname" class="form-label">Full name</label>
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
                                    <input type="text" class="form-control" id="cc-name" placeholder="M T M Disanayake" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="cc-number" class="form-label">Credit card number</label>
                                    <input type="text" class="form-control" id="cc-number" placeholder="4444333322221111" required="">
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
            function rem(x) {
                var now = document.getElementById('cart_item_count_' + x).innerHTML;
                if (now > 0) {
                    document.getElementById('cart_item_count_' + x).innerHTML = parseInt(now) - 1;
                }
            }

            function add(x) {
                var now = document.getElementById('cart_item_count_' + x).innerHTML;
                document.getElementById('cart_item_count_' + x).innerHTML = parseInt(now) + 1;
            }

            function checkout() {
                var form = document.getElementById('cart_form');
                var price = document.getElementById('cart_total');
                var bill = document.getElementById('bill').innerHTML;
                price.value = bill.replace("$", "");
                if(validate_cart_details()){
                    form.submit();
                }
            }

            function remove_cart_item(x) {
                document.getElementById('cart_item_count_' + x).innerHTML = 0;
                var myModalEl = document.getElementById('cartModel')
                var modal = bootstrap.Modal.getInstance(myModalEl)
                modal.hide();
                show_cart();
            }

            function show_cart() {
                var form = document.getElementById('js_gen');
                var wrap = document.getElementById('cart_wrap');
                wrap.innerHTML = "";
                var totalAmt = 0;
                form.innerHTML = "";
                var itemCount = 0;
                for (var i = 1; i <= 8; i++) {
                    var cnt = document.getElementById('cart_item_count_' + i).innerHTML;
                    if (cnt > 0) {
                        itemCount++;
                        var nam = document.getElementById('cart_item_name_' + i).innerHTML;
                        var val = document.getElementById('cart_item_price_' + i).innerHTML;
                        var c_id = document.getElementById('cart_item_id_' + i).value;
                        var amt = 0;
                        val = val.replace("$ ", "");
                        val = val.replace(" USD", "");
                        amt = val * cnt;
                        totalAmt += amt;
                        form.innerHTML = form.innerHTML + '<input type="hidden" name="itemId_' + itemCount +
                            '" value="' + c_id + '">';
                        form.innerHTML = form.innerHTML + '<input type="hidden" name="itemCount_' + itemCount +
                            '" value="' +
                            cnt + '">';
                        wrap.innerHTML = wrap.innerHTML +
                            '<li id="cart_item_' + i +
                            '" class="list-group-item d-flex justify-content-between lh-sm"><div class="desc"><h6 class="my-0">' +
                            nam + '</h6><small class="text-muted">Amount : ' +
                            cnt + '</small></div> <span class="text-muted">$' + amt.toFixed(2) +
                            ' <i onclick="remove_cart_item(' +
                            i + ')" class="bi bi-trash3"></i></span></li>';
                    }
                }
                form.innerHTML = form.innerHTML + '<input type="hidden" name="price" id="cart_total">';
                form.innerHTML = form.innerHTML + '<input type="hidden" name="itemCount" value="' + itemCount + '">';
                form.innerHTML = form.innerHTML + '<input type="hidden" name="coffee_checkout">';

                if (totalAmt <= 0) {
                    swal("Empty Cart", "Select at least one type of coffee to view", "info");
                    return;
                }
                wrap.innerHTML = wrap.innerHTML +
                    '<li class="list-group-item d-flex justify-content-between"><span>Total (USD)</span><strong id="bill">$' +
                    totalAmt.toFixed(2) + '</strong></li>';
                var myModal = new bootstrap.Modal(document.getElementById('cartModel'), {
                    keyboard: false
                });
                myModal.show();
            }
            </script>
            <div class="x2"></div>
            <?php 
                $sql = "SELECT * FROM coffees WHERE status = 1";
                $result = $__conn->query($sql);
                if ($result->num_rows > 0) {
                    $count = 1;
                    while($row = $result->fetch_assoc()) {
                        echo'
                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 col-xxl-3 mb-4">
                            <div class="table-card">
                                <img src="uploads/coffees/'.$row["image"].'" alt="" class="coffee">
                                <div class="desc">
                                    <input type="hidden" id="cart_item_id_'.$count.'" value="'.$row["id"].'">
                                    <li id="cart_item_name_'.$count.'">'.$row["name"].'</li>
                                    <li id="cart_item_price_'.$count.'">$ '.$row["price"].' USD</li>
                                    <div class="x2"></div>
                                    <div class="row">
                                        <div class="col-4 card-count-btn" style="text-align:left;"><button onclick="rem('.$count.')">-</button></div>
                                        <div class="col-4 card-count-value"><div id="cart_item_count_'.$count.'" >0</div></div>
                                        <div class="col-4 card-count-btn" style="text-align:right;"><button onclick="add('.$count.')">+</button></div>
                                    </div>
                                </div>
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