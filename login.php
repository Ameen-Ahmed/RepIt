<?php require_once('private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validations
    if(is_blank($username)) {
        $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)) {
        $errors[] = "Password cannot be blank.";
    }

    // if there were no errors, try to login
    if(empty($errors)) {
        // Using one variable ensures that msg is the same
        $login_failure_msg = "Log in was unsuccessful.";

        $user = find_user_by_username($username);
        if($user) {

            if(password_verify($password, $user['password'])) {
                // password matches
                log_in_user($user);
                echo "LOGIN SUCCESSFUL";
            } else {
                // username found, but password does not match
                $errors[] = $login_failure_msg;
            }

        } else {
            // no username found
            $errors[] = $login_failure_msg;
        }
    }
}
$page_title = 'Login';
?>

<?php include_once('private/shared/header.php');?>
<body class="homepage">
    <?php echo display_errors($errors); ?>
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
                                                <input type="text" name="username" id="contact-name" placeholder="Username" />
                                            </div>
                                            <div class="6u 12u(mobile)">
                                                <input type="text" name="password" id="contact-email" placeholder="Password" />
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
                </div>
                <!-- Footer -->
                <?php require_once('private/shared/footer.php');?>

            </div>
        </div>
    </div>
</body>
</html>
