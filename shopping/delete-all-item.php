<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if (!isset($_SERVER['HTTP_REFERER'])){
    header('location: index.php');
    exit;
}

if (!isset($_SESSION['username'])) {
    header("location: ".APPURL."");
}

if(isset($_POST['delete'])){

    $delete = $pdo->prepare("DELETE FROM cart WHERE user_id='$_SESSION[user_id]'");
    
    $delete->execute();

}

?>

<?php require "../includes/footer.php"; ?>