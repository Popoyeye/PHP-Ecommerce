<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if (!isset($_SESSION['adminname'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $select = $pdo->query("SELECT * FROM products WHERE id='$id'");
    $select->execute();

    $images = $select->fetch(PDO::FETCH_OBJ);

    unlink("images/".$images->image."");

    $delete = $pdo->query("DELETE FROM products WHERE id='$id'");
    $delete->execute();

    header("location: ".ADMINURL."/products-admins/show-products.php");

} else{
    header("location: http://localhost/bookstore/404.php");
}

?>