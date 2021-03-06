<?php require_once('private/initialize.php');

if(is_post_request()){

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';
    mailer($name, $email, $message);
}
$page_title = 'Contact';
?>

<?php include_once('private/shared/header.php');?>
<head>
  <title>$page_title</title>
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
                    <div class="title"><font size=5>Contact Us</font></div>
                    <div id="footer" class="container">
                        <header class="style1">
                            <h2>Have a question or comment?</h2>
                            <p>Feel free to send us a message. We'll get back to you as soon as we can!<br /></p>
                        </header>
                        <hr />
                        <div class="row 150%">
                            <div class="6u 12u(mobile)">
                                <!-- Contact Form -->
                                <section>
                                    <form method="post" action="#">
                                        <div class="row 50%">
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="name" id="contact-name" placeholder="Name" />
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="email" id="contact-email" placeholder="Email" />
                                            </div>
                                        </div>
                                        <div class="row 50%">
                                            <div class="12u">
                                                <textarea name="message" id="contact-message" placeholder="Message" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="12u">
                                                <ul class="actions">
                                                    <li><input type="submit" class="style1" value="Send" /></li>
                                                    <li><input type="reset" class="style2" value="Cancel" /></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </div>
                            <div class="6u 12u(mobile)">
                                <!-- Contact -->
                                <section class="feature-list small">
                                    <div class="row">
                                        <div class="6u 12u(mobile)">
                                            <section>
                                                <h3 class="icon fa-home">Mailing Address</h3>
                                                <p>RepIt LLC<br />
                                                    1234 Somewhere Rd<br />
                                                    Charlottesville, VA 22904</p>
                                            </section>
                                        </div>
                                        <div class="6u 12u(mobile)">
                                            <section>
                                                <h3 class="icon fa-comment">Social</h3>
                                                <p><a href="#">@repit-llc</a><br />
                                                    <a href="#">facebook.com/repit</a></p>
                                            </section>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="6u 12u(mobile)">
                                            <section>
                                                <h3 class="icon fa-envelope">Email</h3>
                                                <p>rep.it.contactus@gmail.com</p>
                                            </section>
                                        </div>
                                        <div class="6u 12u(mobile)">
                                            <section>
                                                <h3 class="icon fa-phone">Phone</h3>
                                                <p>
                                                    (434)-555-0000
                                                </p>
                                            </section>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                        <hr />
                    </div>
                </div>
            </div>
        </div>
        <!-- Header -->
        <div id="header-wrapper" class="wrapper" style="padding:50px 50px 50px 100px;">
            <?php require_once('private/shared/footer.php');?>
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
