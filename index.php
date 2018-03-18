<?php require_once('private/initialize.php');
$page_title = 'Home';
?>

<?php include_once('private/shared/header.php');?>

<body class="homepage">
    <div id="page-wrapper">
        <!-- Header -->
        <div id="header-wrapper" class="wrapper">
            <div id="header">
                <!-- Logo -->
                <div id="logo">
                    <h1><i>Rep It</i></h1>
                </div>
                <!-- Nav -->
                <?php include_once('private/shared/navigation.php');?>
            </div>
        </div>

        <!-- Main -->
        <div class="wrapper style2">
            <div class="title"><font size=5>Welcome</font></div>
            <div id="main" class="container">
                <!-- Features -->
                <section id="features">
                    <header class="style1">
                        <h2>Your One-Stop-Shop For All Fan Apparel!</h2>
                    </header>
                    <div class="feature-list">
                        <div class="row">
                            <div class="6u 12u(mobile)">
                                <section>
                                    <h3 class="icon fa-comment">Exclusive Selection</h3>
                                    <p>Browse through a large selection of official event merchandise to purchase exclusive swag. </p>
                                </section>
                            </div>
                            <div class="6u 12u(mobile)">
                                <section>
                                    <h3 class="icon fa-refresh">Speedy Delivery</h3>
                                    <p>Ship anywhere in the continental United States within 1 week. Speedy 2-day shipping also available!</p>
                                </section>
                            </div>
                        </div>
                        <div class="row">
                            <div class="6u 12u(mobile)">
                                <section>
                                    <h3 class="icon fa-wrench">Secure Resale</h3>
                                    <p>Resell any new or lightly worn merchandise to our large base of members. You'll find a buyer in no time.</p>
                                </section>
                            </div>
                            <div class="6u 12u(mobile)">
                                <section>
                                    <h3 class="icon fa-check">Certified Quality</h3>
                                    <p>We guarentee that all products sold meet scrupulous quality benchmarks, or your money back.</p>
                                </section>
                            </div>
                        </div>
                    </div>
                    <ul class="actions actions-centered">
                        <li><a href="store.php" class="button style1 big">Get Started</a></li>
                        <li><a href="about.php" class="button style2 big">About Us</a></li>
                    </ul>
                    </div>
                </section>
        </div>
    </div>
    </div>
<!-- Header -->
<div id="header-wrapper" class="wrapper" style="padding:50px 50px 50px 100px;">
    <?php require_once('private/shared/footer.php');?>
</div>


<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/skel-viewport.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>
</body>
</html>
