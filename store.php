<?php
require_once('private/initialize.php');
$page_title = 'Store';
require_login();
?>

<?php include_once('private/shared/header.php');?>

<head>
  <title>$page_title</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
  <link rel="stylesheet" href="assets/css/main.css" />
  <link rel="stylesheet" href="assets/css/modal-design.css" />
  <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
</head>
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
                      <!-- The Modal -->

                      <?php require_once('private/store_functions.php');
                          populate_store();
                      ?>
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
<script src="assets/js/modal-popup.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</html>
