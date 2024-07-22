<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if (!isset($_SESSION['adminname'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
}

if(isset($_GET['id']) AND isset($_GET['status'])) {

    $id = $_GET['id'];
    $status = $_GET['status'];

    if($status > 0) {

        $update = $pdo->prepare("UPDATE products SET status = 0 WHERE id='$id'");
        $update->execute();

        header("location: ".ADMINURL."/products-admins/show-products.php");

    } else {
        $update = $pdo->prepare("UPDATE products SET status = 1 WHERE id='$id'");
        $update->execute();

        header("location: ".ADMINURL."/products-admins/show-products.php");
    }

}

?>

