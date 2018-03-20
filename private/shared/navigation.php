<nav id="nav">
    <ul>
        <li class="current"><a href="index.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="store.php">Store</a></li>
        <li><a href="shopping_cart.php">Shopping Cart</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <?php
            if(!is_logged_in()){
                echo "<li><a href=login.php>Login</a></li>";
            }
        ?>
        <?php
            if(is_logged_in()){
                echo "<li><a href=logout.php>Logout</a></li>";
            }
        ?>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <?php if (is_logged_in()){
        echo "Logged In as: " . $_SESSION['username'];}
    ?>
</nav>
