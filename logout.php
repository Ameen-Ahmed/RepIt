<?php require_once("private/initialize.php");



log_out_user();
    unset($_SESSION['current_user_id']);
    redirect_to("login.php");
?>
