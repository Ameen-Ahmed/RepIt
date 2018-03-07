<?php require_once('private/initialize.php');
$page_title = 'Store';
?>

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
                                    <ul class="actions">
                                        <li><a href="#" class="button style1">Learn More</a></li>
                                    </ul>
                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/travis-scott-jacket.jpg" alt="" /></a>
                                    <h3><a href="#">Travis $cott Rodeo Bomber Jacket</a></h3>
                                    <ul class="actions">
                                        <li><a href="#" class="button style1">Learn More</a></li>
                                    </ul>
                                </section>
                            </div>
                            <div class="4u 12u(mobile)">
                                <section class="highlight">
                                    <a href="#" class="image featured"><img src="images/XO-Weeknd-TSHIRT.jpg" alt="" /></a>
                                    <h3><a href="#">XO Weeknd T-shirt</a></h3>

                                    <ul class="actions">
                                        <li><a href="#" class="button style1">Learn More</a></li>
                                    </ul>
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
</html>
