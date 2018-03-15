<?php
require_once('private/initialize.php');


$page_title = 'Store';
?>
<!-- <?php require('private/Bitpay/create_invoice.php');?> -->

<?php include_once('private/shared/header.php');?>

<body class="homepage">
    <div id="page-wrapper">
        <!-- Header -->
        <div id="header-wrapper" class="wrapper">
            <div id="header">
                <!-- Nav -->
                <?php include_once('private/shared/navigation.php');?>

                <!-- Highlights -->
                <div class="wrapper style3">
                    <div class="title">Store</div>
                    <div id="highlights" class="container">
                        <div class="row 150%">
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/ArianaGrandeShirt.jpg" alt="" /></a>
                                    <h3><a href="#">Ariana Grande Sweater</a></h3>
                                    <h5>Price:  $59.99</h5>
                                    <br />
                                    <input class="button style1" onClick='payment_request("Order #00294", "Item #0001", "Ariana Grande T-Shirt", "59.99", this)'type="button" value="Buy Now" id="myButton1"></input>

                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/travis-scott-jacket.jpg" alt="" /></a>
                                    <h3><a href="#">Travis $cott Rodeo Bomber Jacket</a></h3>
                                    <h5>Price:  $119.99</h5>
                                    <br />
                                    <input class="button style1"  onClick='payment_request("Order #00365", "Item #0002", "Travis $cott Jacker", "119.99", this)' type="button" value="Buy Now" id="myButton1"></input>
                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/XO-Weeknd-TSHIRT.jpg" alt="" /></a>
                                    <h3><a href="#">XO Weeknd T-shirt</a></h3>
                                    <h5>Price:  $19.99</h5>
                                    <br />
                                    <input class="button style1"  onClick='payment_request("Order #00234", "Item #0003", "XO Weeknd T-Shirt", "19.99", this)' type="button" value="Buy Now" id="myButton1"></input>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <?php require_once('private/shared/footer.php');?>
            </div>
        </div>
    </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://bitpay.com/bitpay.js" type="text/javascript"> </script>
<script src="invoice_display.js" type="text/javascript"></script>
</html>
