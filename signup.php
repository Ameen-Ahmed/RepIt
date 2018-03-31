<?php require_once("private/initialize.php");

if(is_post_request()) {
    $user = [];
    $user['firstname'] = $_POST['firstname'] ?? '';
    $user['lastname'] = $_POST['lastname'] ?? '';
    $user['email'] = $_POST['email'] ?? '';
    $user['username'] = $_POST['username'] ?? '';
    $user['address'] = $_POST['address'] ?? '';
    $user['state'] = $_POST['state'] ?? '';
    $user['city'] = $_POST['city'] ?? '';
    $user['zipcode'] = $_POST['zipcode'] ?? '';
    $user['password'] = $_POST['password'] ?? '';
    $user['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = insert_user($user);

    if($result === true) {
        $user['id'] = mysqli_insert_id($db);
        log_in_user($user);
        mailer($user['firstname'] . $user['lastname'], $user['email'], 'Confirmation email');
        $_SESSION['current_user_id'] = $user['id'];
        redirect_to(url_for('index.php'));

    }
    else{
        $errors = $result;
    }

} else {
    $user['firstname'] = '';
    $user['lastname'] = '';
    $user['email'] = '';
    $user['username'] = '';
    $user['address'] = '';
    $user['state'] = '';
    $user['city'] = '';
    $user['zipcode'] = '';
}

$state_set = find_all_state_abrr();
$state_count = mysqli_num_rows($state_set);
$states = mysqli_fetch_all($state_set, MYSQLI_NUM);
mysqli_free_result($state_set);



$page_title = 'Sign Up';
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

                <span style="color:red; font-size:1.2em;"><?php echo display_errors($errors)?></span>
                <!-- Footer -->
                <div id="footer-wrapper" class="wrapper">
                    <div class="title"><font size=5>Sign Up</font></div>
                    <div id="footer" class="container">
                        <hr />
                        <div class="row 150%">
                            <div class="10u 12u(mobile)">
                                <!-- Contact Form -->
                                <section>
                                    <form method="post" action="signup.php">
                                        <div class="row 50%">
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="firstname" id="signup-name" placeholder="First Name" value="<?php echo h($user['firstname']); ?>" />
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="lastname" id="signup-name" placeholder="Last Name" value="<?php echo h($user['lastname']); ?>"/>
                                            </div>
                                            <div class="12u 12u(mobile)">
                                                <input type="text" name="username" id="signup-username" placeholder="Username" value="<?php echo h($user['username']); ?>"/>
                                            </div>
                                            <div class="12u 12u(mobile)">
                                                <input type="text" name="email" id="signup-email" placeholder="E-mail Address" value="<?php echo h($user['email']); ?>"/>
                                            </div>
                                            <div class="12u 12u(mobile)">
                                                <input type="text" name="address" id="signup-email" placeholder="Address" value="<?php echo h($user['address']); ?>"/>
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="city" id="signup-name" placeholder="City" value="<?php echo h($user['city']); ?>"/>
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <select name="state">
                                                    <option value="" disabled selected>Choose State</option>
                                                    <?php
                                                    for($i=1; $i < $state_count; $i++) {
                                                        echo "<option value=" . implode($states[$i]);
                                                        echo ">" . implode($states[$i]) . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="12u 12u(mobile)">
                                                <input type="text" name="zipcode" id="signup-email" placeholder="Zipcode" value="<?php echo h($user['zipcode']); ?>" />
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <input type="password" name="password" id="signup-password" placeholder="Password" />
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <input type="password" name="confirm_password" id="signup-pass-confirmation" placeholder="Confirm password" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="12u">
                                                <ul class="actions">
                                                    <li><input type="submit" class="style1" value="Sign Up" /></li>
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
                    <!-- Footer -->
                    <?php require_once('private/shared/footer.php');?>
                </div>
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
