<?php
require_once('private/initialize.php');


$page_title = 'Shopping Cart';
?>
<?php include_once('private/shared/header.php');
?>

<body class="homepage">
    <div id="page-wrapper">
        <!-- Header -->
        <div id="header-wrapper" class="wrapper">
            <div id="header">
                <!-- Nav -->
                <?php include_once('private/shared/navigation.php');?>

                <!-- Highlights -->
                <div class="wrapper style2">
                    <div class="title"><font size=5>Your Cart</font></div>
                    <div id="main" class="container">

                        <!-- Features -->
                              <?php
                              require_once('private/cart_functions.php');
                                  initialize_cart('3');
                                  populate_cart();

                              ?>

                    <div class='feature-list'>
                      <div class='row'>
                        <div class='12u 12u(mobile)'>
                          <section>
                          </section>
                        </div>
                      </div>
                    </div>

                    <div class='feature-list'>
                      <div class='row'>
                        <div class='12u 12u(mobile)'>
                          <section>
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
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/skel-viewport.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://bitpay.com/bitpay.js" type="text/javascript"> </script>
<script src="private/checkout_functions.js" type="text/javascript"></script>
</html>
