<?php require_once('private/initialize.php');

$page_title = 'Edit';
require_login();

if(is_post_request()) {
    $user = [];
    $user['user_id'] = $_SESSION['user_id'];
    $user['first_name'] = $_POST['first_name'] ?? '';
    $user['last_name'] = $_POST['last_name'] ?? '';
    $user['email'] = $_POST['email'] ?? '';
    $user['address'] = $_POST['address'] ?? '';
    $user['city'] = $_POST['city'] ?? '';
    $user['zipcode'] = $_POST['zipcode'] ?? '';

    $result = update_account_settings($user);

    if($result === true) {
        redirect_to(url_for('membership.php'));

    }
    else{
        $errors = $result;
    }

} else {
    $user['first_name'] = '';
    $user['last_name'] = '';
    $user['email'] = '';
    $user['address'] = '';
    $user['city'] = '';
    $user['zipcode'] = '';
}

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
                    <div class="title"><font size=10>Edit</font></div>
                    <section id="intro" class="container">
                        <header class="style2">
                            <h2>Update Account Information</h2>
                        </header>
                        <section>
                            <form method="post" action="update_account.php">
                                <div class="row 50%">
                                    <div class="6u 12u(mobile)">
                                        <input type="text" name="first_name" placeholder="First Name" value="<?php echo h($user['first_name']); ?>" />
                                    </div>
                                    <div class="6u 12u(mobile)">
                                        <input type="text" name="last_name" placeholder="Last Name" value="<?php echo h($user['last_name']); ?>"/>
                                    </div>
                                    <div class="12u 12u(mobile)">
                                        <input type="text" name="email" placeholder="E-mail Address" value="<?php echo h($user['email']); ?>"/>
                                    </div>
                                    <div class="12u 12u(mobile)">
                                        <input type="text" name="address" placeholder="Address" value="<?php echo h($user['address']); ?>"/>
                                    </div>
                                    <div class="7u 12u(mobile)">
                                        <input type="text" name="city" placeholder="City" value="<?php echo h($user['city']); ?>"/>
                                    </div>
                                    <div class="2u 12u(mobile)">
                                        <input type="text" name="zipcode" placeholder="Zipcode" value="<?php echo h($user['zipcode']); ?>" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="12u">
                                        <ul class="actions">
                                            <li><input type="submit" class="style3" value="Update" /></li>
                                            <li><input type="reset" class="style4" value="Cancel" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </section>
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