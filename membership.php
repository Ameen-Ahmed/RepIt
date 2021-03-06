<?php require_once('private/initialize.php');
$page_title = 'Membership';
require_login();

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
                        <header class="style2">
                            <h2>Your Account</h2>
                        </header>
                        <p class="style1" >
                            <strong>First Name: </strong> <?php echo $user['first_name']?>
                        </p>
                        <p class="style1" >
                            <strong>Last Name: </strong> <?php echo $user['last_name']?>
                        </p>
                        <p class="style1" >
                            <strong>Username: </strong> <?php echo $user['username']?>
                        </p>
                        <p class="style1">
                            <strong>Email: </strong><?php echo $user['email']?>
                        </p>
                        <p class="style1">
                            <strong>Address: </strong><?php echo $user['address']?>
                        </p>
                        <a href=update_account.php><input type="submit" class="style4" value="Edit" /></a>
                    </section>
<!--
                    <section id="intro" class="container">
                        <header class="style2">
                            <h2>Past Orders</h2>
                        </header>
                         <div class='feature-list'>
                            <?php
                            $items = get_items_by_user_id($user['id']);
                            while($item = mysqli_fetch_assoc($items)){
                                echo "<div class='feature-list'>";
                                echo "<div class='row'>";
                                echo "<div class='3u 12u(mobile)'>";
                                    echo "<img src='" . $item['file_path'] . "' alt='' style=width:200px>";
                                echo "</div>";
                                echo "<div class='4u 12u(mobile)'>";
                                    echo "<font size=6><b><u>" . $item['name'] . "</u></b></font><br/>";
                                    echo "<font size=4><b>Seller: </b>" . $user['username'] . "</font><br/>";
                                echo "</div>";
                                    echo "<div class='3u 12u(mobile)'>";
                                        echo "<font size=5 color='red'><b>Price: </b>" .  $item['price'] . "</font><br/>";
                                        echo "<form method='post' action='#'>";
                                        echo "</form>";
                                    echo "</div>";
                                echo "</div>";
                                echo "<div class='row'>";
                                    echo "<div class='12u 12u(mobile)'>";
                                        echo "<section>";
                                        echo "</section>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";
                        }
                        ?>
                        </div>
                    </section>
-->
                    <section id="intro" class="container">
                        <header class="style2">
                            <h2>Your Items For Sale</h2>
                        </header>
                        <div class='feature-list'>
                            <?php
                                $items = get_items_by_user_id($user['id']);
                                while($item = mysqli_fetch_assoc($items)){
                                    echo "<div class='feature-list'>";
                                    echo "<div class='row'>";
                                    echo "<div class='3u 12u(mobile)'>";
                                        echo "<img src='" . $item['file_path'] . "' alt='' style=width:200px>";
                                    echo "</div>";
                                    echo "<div class='4u 12u(mobile)'>";
                                        echo "<font size=6><b><u>" . $item['name'] . "</u></b></font><br/>";
                                        echo "<font size=5 color='red'><b>Price: </b>" .  $item['price'] . "</font><br/>";
                                    echo "</div>";
                                        echo "<div class='3u 12u(mobile)'>";
                                            echo "<form method='post' action='#'>";
                                                echo "<form action=# method=post><input class='button style4' name='" . $item['item_id'] . "' type='submit' value='Remove Item'></input></form>";
                                                echo "<br/>";
                                            echo "</form>";
                                        echo "</div>";
                                    echo "</div>";
                                    echo "<div class='row'>";
                                        echo "<div class='12u 12u(mobile)'>";
                                            echo "<section>";
                                            echo "</section>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            }
                            ?>
                        </div>
                        </p>
                    </section>
                <div style="text-align:center;">
                    <a href=new_item.php><input type="submit" class="style4" value="Add Item" /></a>
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
