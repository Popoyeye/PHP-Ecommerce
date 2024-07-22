<?php

ob_start(); // Start output buffering

require "includes/header.php";
require "config/config.php";

if (!isset($_SERVER['HTTP_REFERER'])){
    header('location: index.php');
    exit;
}

if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    echo "User not logged in or email not set.";
    exit;
}

$select = $pdo->query("SELECT * FROM cart WHERE user_id='$_SESSION[user_id]'");
$select->execute();
$allProducts = $select->fetchAll(PDO::FETCH_OBJ);


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'izhamzam27@gmail.com';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //Sender
    $mail->setFrom('izhamzam27@gmail.com', 'Sender');

    //Receiver
    $mail->addAddress($_SESSION['email'], 'Receiver');
    

    foreach($allProducts as $products) {
        $path  = 'admin-panel/products-admins/invoices';
        //$file = $products->pro_file;

        for($i=0; $i < count($allProducts); $i++) {

            $mail->addAttachment($path . "/" . $products->pro_file);         //Add attachments

        }
    }


    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Invoice';
    $mail->Body    = 'This is your invoice MYR ' .$_SESSION['price'].' <b>Thanks for buying from us</b>';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    // Delete cart after sending the invoice
    $select = $pdo->query("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'");
    $select->execute();

    header("location: paid.php");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

ob_end_flush(); // Flush the output buffer

?>
