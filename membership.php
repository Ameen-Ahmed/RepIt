<?php require_once('private/initialize.php');
$page_title = 'Membership';

$user = find_user_by_id($_SESSION['user_id']);
?>

<?php include_once('private/shared/header.php');?>

<body class="homepage">
    <div id="page-wrapper">
        <!-- Header -->
        <div id="header-wrapper" class="wrapper">
            <div id="header">
                <!-- Nav -->
                <?php include_once('private/shared/navigation.php');?>
                <!-- Intro -->
                <div id="intro-wrapper" class="wrapper style1">
                    <div class="title"><font size=4>Account Settings</font></div>
                    <section id="intro" class="container">
                        <p class="style2" style="font-size:32;">
                           Your Account
                        </p>
                        <p class="style3" style="text-align:left;font-size:24;"><strong>Name: </strong> <?php echo $user['first_name']?></p>
                        <p class="style3" style="text-align:left;font-size:24;"><strong>Email: </strong><?php echo $user['email']?></p>
                        <p class="style3" style="text-align:left;font-size:24;"><strong>Address: </strong><?php echo $user['address']?></p>
                    </section>
                    <section id="intro" class="container">
                        <p class="style2" style="font-size:42;">
                            Past Orders
                        </p>
                    </section>
                    <section id="intro" class="container">
                        <p class="style2" style="font-size:42;">
                            Sell a Product
                        </p>
                    </section>
                </div>
                <!-- Footer -->
                <?php require_once('private/shared/footer.php');?>
            </div>
        </div>
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
