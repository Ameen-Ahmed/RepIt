<nav id="nav">
    <ul>
        <li class="current"><a href="index.php"><font size=4>Home</font></a></li>
        <li><a font-size:100px href="about.php"><font size=4>About Us</font></a></li>
        <li><a href="store.php"><font size=4>Store</font></a></li>
        <li><a href="shopping_cart.php"><font size=4>Shopping Cart</font></a></li>
        <?php
            if(!is_logged_in()){
                echo "<li><a href=signup.php><font size=4>Sign Up</font></a></li>";
                echo "<li><a href=login.php><font size=4>Login</font></a></li>";
            }
        ?>
        <?php
            if(is_logged_in()){
                echo "<li><a href=logout.php><font size=4>Logout</font></a></li>";
            }
        ?>
        <li><a href="contact.php"><font size=4>Contact Us</font></a></li>
    </ul>
    <?php if (is_logged_in()){
        echo "Logged In as: " . $_SESSION['username'];}
    ?>
</nav>
