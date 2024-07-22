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

    $id = $_POST['id'];

    $delete = $pdo->prepare("DELETE FROM cart WHERE id='$id'");
    
    $delete->execute();

}

?>

<?php require "../includes/footer.php"; ?>