<?php require_once("private/initialize.php");

if(is_post_request()) {
    $signup = [];
    $signup['firstname'] = $_POST['firstname'] ?? '';
    $signup['lastname'] = $_POST['lastname'] ?? '';
    $signup['email'] = $_POST['email'] ?? '';
    $signup['username'] = $_POST['username'] ?? '';
    $signup['address'] = $_POST['address'] ?? '';
    $signup['state'] = $_POST['state'] ?? '';
    $signup['city'] = $_POST['city'] ?? '';
    $signup['zipcode'] = $_POST['zipcode'] ?? '';
    $signup['password'] = $_POST['password'] ?? '';
    $signup['confirm_password'] = $_POST['confirm_password'] ?? '';

    $result = insert_signup($signup);

    if($result === true) {
        $new_id = mysqli_insert_id($db);
        echo "SUCCESSFUL";
        //        redirect_to(url_for(''));

    }
    else{
        $errors = $result;
    }

} else {

}

$state_set = find_all_state_abrr();
$state_count = mysqli_num_rows($state_set);
$states = mysqli_fetch_all($state_set, MYSQLI_NUM);
mysqli_free_result($state_set);
?>



<!DOCTYPE HTML>
<html>
    <head>
        <title>RepIt | Sign Up</title>
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
                    <nav id="nav">
                        <ul>
                            <li class="current"><a href="index.php">Home</a></li>
                            <li><a href="about.php">About Us</a></li>
                            <li><a href="store.php">Store</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </nav>
                    <span style="color:red; font-size:1.2em;"><?php echo display_errors($errors)?></span>
                    <!-- Footer -->
                    <div id="footer-wrapper" class="wrapper">
                        <div class="title">Sign Up</div>
                        <div id="footer" class="container">
                            <hr />
                            <div class="row 150%">
                                <div class="6u 12u(mobile)">
                                    <!-- Contact Form -->
                                    <section>
                                        <form method="post" action="signup.php">
                                            <div class="row 50%">
                                                <div class="6u 12u(mobile)">
                                                    <input type="text" name="firstname" id="signup-name" placeholder="First Name" value="<?php echo h($signup['firstname']); ?>" />
                                                </div>
                                                <div class="6u 12u(mobile)">
                                                    <input type="text" name="lastname" id="signup-name" placeholder="Last Name" value="<?php echo h($signup['lastname']); ?>"/>
                                                </div>
                                                <div class="12u 12u(mobile)">
                                                    <input type="text" name="username" id="signup-username" placeholder="Username" value="<?php echo h($signup['username']); ?>"/>
                                                </div>
                                                <div class="12u 12u(mobile)">
                                                    <input type="text" name="email" id="signup-email" placeholder="E-mail Address" value="<?php echo h($signup['email']); ?>"/>
                                                </div>
                                                <div class="12u 12u(mobile)">
                                                    <input type="text" name="address" id="signup-email" placeholder="Address" value="<?php echo h($signup['address']); ?>"/>
                                                </div>
                                                <div class="6u 12u(mobile)">
                                                    <input type="text" name="city" id="signup-name" placeholder="City" value="<?php echo h($signup['city']); ?>"/>
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
                                                    <input type="text" name="zipcode" id="signup-email" placeholder="Zipcode" value="<?php echo h($signup['zipcode']); ?>" />
                                                </div>
                                                <div class="6u 12u(mobile)">
                                                    <input type="text" name="password" id="signup-password" placeholder="Password" />
                                                </div>
                                                <div class="6u 12u(mobile)">
                                                    <input type="text" name="confirm_password" id="signup-pass-confirmation" placeholder="Confirm password" />
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
                        <div id="copyright">
                            <ul>
                                <li>&copy; RepIt 2018</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php db_disconnect($db); ?>
    </body>
</html>
