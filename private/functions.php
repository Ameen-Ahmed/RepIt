<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['mail_name']) || isset($_POST['mail_email']) || isset($_POST['message'])) {
  //send mail from here
  //mailer($_POST['mail_name'], $_POST['mail_email'], $_POST['message']);
}

function url_for($script_path) {
  // add the leading '/' if not present
  if($script_path[0] != '/') {
    $script_path = "/" . $script_path;
  }
  return WWW_ROOT . $script_path;
}

function u($string="") {
    return urlencode($string);
}

function raw_u($string="") {
    return rawurlencode($string);
}

function h($string="") {
    return htmlspecialchars($string);
}

function redirect_to($location) {
  header("Location: " . $location);
  exit();
}

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function is_get_request() {
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function display_errors($errors=array()) {
    $output = '';
    if(!empty($errors)) {
        $output .= "<div class=\"errors\">";
        $output .= "Please fix the following errors:";
        $output .= "<ul>";
        foreach($errors as $error) {
            $output .= "<li>" . h($error) . "</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}


function mailer($name, $email, $message){
    require 'private/PHPMailer/PHPMailer/src/Exception.php';
    require 'private/PHPMailer/PHPMailer/src/PHPMailer.php';
    require 'private/PHPMailer/PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debuh output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'repitcontactus@gmail.com';         // SMTP username
        $mail->Password = 'ecomMproJect';                     // SMTP password
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587; // TCP port to connect to

        //NOT SECURE
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        //Recipients
        $mail->setFrom('repitcontactus@gmail.com', 'RepIt');
        $mail->addAddress($email);
        $mail->addReplyTo($email);                            // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = '[Reply To]' . $name;
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();

    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}

?>
