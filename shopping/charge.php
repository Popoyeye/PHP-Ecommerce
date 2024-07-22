<?php

ob_start(); // Start output buffering

require  "../includes/header.php";
require  "../config/config.php";
require  "../vendor/autoload.php";


    if (!isset($_SERVER['HTTP_REFERER'])){
        header('location: index.php');
        exit;
    }

    if(!isset($_SESSION['username'])) {
        header("location: ".APPURL."");
    }


    if(isset($_POST['email'])) {

        \Stripe\Stripe::setApiKey('sk_test_51PeAiSGmDqqbwnlQw8Sxbxzj3A2xePknfrwdjYD8t5DLS7SAcD8x5if0YAodvutWaEDtn3Pm9qjFq9BkXLsZk5iN00OfNHbeNk');

        $charge = \Stripe\Charge::create([

            'source' => $_POST['stripeToken'],
            'amount' => (double)$_SESSION['price'] * 100,
            'currency' => 'myr',
        
        ]);

        echo "paid";

        if(empty($_POST['email']) OR empty($_POST['username']) OR empty($_POST['fname']) OR empty($_POST['lname'])) {
            echo "<script>alert('one or more inputs are empty');</script>";
        } else {

            $email = $_POST['email'];
            $username = $_POST['username'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $price = $_SESSION['price'] * 100;
            $token = $_POST['stripeToken'];
            $user_id = $_SESSION['user_id'];

            $cart_items = $pdo->prepare("SELECT pro_name FROM cart WHERE user_id=:user_id");
            $cart_items->execute([':user_id' => $user_id]);
            $product = $cart_items->fetchAll(PDO::FETCH_COLUMN);

            $string = implode(",", $product);

            $insert = $pdo->prepare("INSERT INTO orders (email, username, fname, lname, token, price, user_id, pro_name)
            VALUES(:email, :username, :fname, :lname, :token, :price, :user_id, :pro_name)");

            $insert->execute([
            ':email' => $email,
            ':username' => $username,
            ':fname' => $fname,
            ':lname' => $lname,
            ':token' => $token,
            ':price' => $price / 100,
            ':user_id' => $user_id,
            ':pro_name' => $string,

            ]);

            if ($charge) {
                $_SESSION['amount_paid'] = $price / 100; // Store the original price in session
                header("location: ".APPURL."/download.php");
            }

        }
        
    }

ob_end_flush(); // Flush the output buffer

?>
