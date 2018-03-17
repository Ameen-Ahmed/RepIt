<?php
require_once('private/initialize.php');
require_once('private/test.php');


$page_title = 'Store';
?>
<?php include_once('private/shared/header.php');
if(is_post_request()) {
    if(isset($_POST['1'] )){
      add_item('1');
    }
    else if(isset($_POST['2'])){
      add_item('2');
    }
    else if(isset($_POST['3'])){
      add_item('3');
    }
}



?>

<body class="homepage">
    <div id="page-wrapper">
        <!-- Header -->
        <div id="header-wrapper" class="wrapper">
            <div id="header">
                <!-- Nav -->
                <?php include_once('private/shared/navigation.php');?>

                <!-- Highlights -->
                <div class="wrapper style3">
                    <div class="title"><font size=5>Store</font></div>
                    <div id="highlights" class="container">
                      <form method='post' action="#">
                        <div class="row 150%">
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/ArianaGrandeShirt.jpg" alt="" /></a>
                                    <h3><a href="#">Ariana Grande Sweater</a></h3>
                                    <h5>Price:  $59.99</h5>
                                    <br />
                                    <input class="button style1" name=1 type="submit" value="Add to Cart"></input>

                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/travis-scott-jacket.jpg" alt=""/></a>
                                    <h3><a href="#">Travis $cott Rodeo Bomber Jacket</a></h3>
                                    <h5>Price:  $119.99</h5>
                                    <br />
                                    <input class="button style1" name=2 type="submit" value="Add to Cart"></input>
                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/XO-Weeknd-TSHIRT.jpg" alt="" /></a>
                                    <h3><a href="#">XO Weeknd T-shirt</a></h3>
                                    <h5>Price:  $19.99</h5>
                                    <br />
                                    <input class="button style1" name=3 type="submit" value="Add to Cart"></input>
                                </section>
                            </div>
                        </div>
                      </form>
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
<script src="private/store_functions.js" type="text/javascript"></script>
<script src="private/checkout_functions.js" type="text/javascript"></script>
</html>
