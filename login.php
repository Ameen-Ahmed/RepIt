<?php require_once('private/initialize.php');?>
<!DOCTYPE HTML>
<!--
Escape Velocity by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>RepIt | Login</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    </head>
    <body class="homepage">
        <div id="page-wrapper">
            <!-- Header -->
            <div id="header-wrapper" class="wrapper">
                <div id="header">
                    <!-- Nav -->
                    <?php include_once('private/shared/navigation.php');?>
                    <!-- Footer -->
                    <div id="footer-wrapper" class="wrapper">
                        <div class="title">Login</div>
                        <div id="footer" class="container">

                            <hr />
                            <div class="row 150%">
                                <div class="10u 12u(mobile)">

                                    <!-- Contact Form -->
                                    <section>
                                        <form method="post" action="#">
                                            <div class="row 50%">
                                                <div class="6u 12u(mobile)">
                                                    <input type="text" name="name" id="contact-name" placeholder="Username" />
                                                </div>
                                                <div class="6u 12u(mobile)">
                                                    <input type="text" name="email" id="contact-email" placeholder="Password" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="12u">
                                                    <ul class="actions">
                                                        <li><input type="submit" class="style1" value="Login" /></li>
                                                        <li><input type="reset" class="style2" value="Cancel" /></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </section>

                                </div>
                            </div>
                            <hr />
                        </div>
                        <div id="copyright">
                            <ul>
                                <li>&copy; RepIt 2018</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
