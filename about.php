<?php require_once('private/initialize.php');
$page_title = 'About Us';
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
                    <div class="title"><font size=5>About Us</font></div>
                    <section id="intro" class="container">
                        <p class="style2" style="font-size:32;">
                            Our mission is to provide a venue where entertainment fans of all kinds can come to buy and sell event merchandise they can’t find anywhere else.
                        </p>
                        <p class="style3" style="text-align:left;font-size:24;"> Every fan wants to be able to show their support for their favorite artist and every artist wants to reach out to their audience. We want to be the bridge that makes these interactions <strong> safe</strong> and <strong>enjoyable</strong>.</p><br />
                        <p class="style3" style="text-align:left;font-size:24;">If you’re an artist, this is your opportunity to sell your one-of-a-kind, limited edition merchandise on a platform that reaches all your fans.</p><br />
                        <p class="style3" style="text-align:left;font-size:24;">If you’re a fan, you can now buy that iconic t-shirt that you missed out on. If you have bought an item you will not use, you don’t have to let it go to waste.</p><br />
                        <p class="style3" style="text-align:left;font-size:24;">Never before has there been one central location where you can sell and purchase a myriad of quality event merchandise.</p>
                    </section>
                    <section id="intro" class="container">
                        <p class="style2" style="font-size:42;">
                            Meet the Team
                        </p>
                        
                        <div>
                            <p style="float: left;"><img src="images/ameen_circle.gif" height="300px" width="300px" border="1px"></p>
                            <br>
                            <h2>Ameen Ahmed</h2>
                            <h3>Co-Founder and CEO</h3>
                            <br>
                            <p>Favorite Color: Red</p>
                            <p>Favorite Artist: Chris Brown</p>
                        </div>
                        <div style="clear: left;">
                            <p style="float: left;"><img src="images/agyakwa_circle.gif" height="300" width="300" border="1px"></p>
                            <br>
                            <h2>Agyakwa Tenkorang</h2>
                            <h3>Co-Founder and CIO</h3>
                            <br>
                            <p>Favorite Color: Green</p>
                            <p>Favorite Artist: Bruno Mars</p>
                        </div>
                        <div style="clear: left;">
                            <p style="float: left;"><img src="images/dom_circle.gif" height="300" width="300" border="1px"></p>
                            <br>
                            <h2>Dominique Huynh</h2>
                            <h3>COO</h3>
                            <br>
                            <p>Favorite Color: Blue</p>
                            <p>Favorite Artist: Ariana Grande</p>
                        </div>
                        
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
</html>
