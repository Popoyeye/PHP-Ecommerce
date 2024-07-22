<?php

session_start();


define("APPURL", "http://localhost/solestore");
define("APPURL1", "http://localhost/solestore/download.php");
define("IMGURL", "http://localhost/solestore/admin-panel/products-admins/images/");

require dirname(dirname(__FILE__)) . "/config/config.php";

if (isset($_SESSION['user_id'])) {
    $number = $pdo->prepare("SELECT COUNT(*) as num_products FROM cart WHERE user_id = :user_id");
    $number->execute(['user_id' => $_SESSION['user_id']]);
    $getNumber = $number->fetch(PDO::FETCH_OBJ);
}

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5c5946fe44.js" crossorigin="anonymous"></script>

    <title>SoleStore</title>

    <style>
        body {
            font-family: Arial, sans-serif; /* Fallback font for the body */
        }
        
        /* Header fonts */
        h1, h2, h3, h4, h5, h6 {
            font-family: Helvetica, sans-serif; /* Font for all headers */
        }
        .navbar-center {
            display: flex;
            justify-content: center;
            flex: 1;
        }
        .card {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .card-img-top {
            object-fit: cover;
        }
        .site-footer {
            background-color: #f1f1f1;
            padding: 45px 0 20px;
            font-size: 15px;
            line-height: 24px;
            color: #737373;
        }
        .site-footer hr {
            border-top-color: #bbb;
            opacity: 0.5;
        }
        .site-footer hr.small {
            margin: 20px 0;
        }
        .site-footer h6 {
            color: black;
            font-size: 16px;
            text-transform: uppercase;
            margin-top: 5px;
            letter-spacing: 2px;
        }
        .site-footer a {
            color: #737373;
        }
        .site-footer a:hover {
            color: #3366cc;
            text-decoration: none;
        }
        .footer-links {
            padding-left: 0;
            list-style: none;
        }
        .footer-links li {
            display: block;
        }
        .footer-links a {
            color: #737373;
        }
        .footer-links a:active, .footer-links a:focus, .footer-links a:hover {
            color: #3366cc;
            text-decoration: none;
        }
        .footer-links.inline li {
            display: inline-block;
        }
        .site-footer .social-icons {
            text-align: right;
        }
        .site-footer .social-icons a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin-left: 6px;
            margin-right: 0;
            border-radius: 100%;
            background-color: #33353d;
        }
        .copyright-text {
            margin: 0;
        }
        @media (max-width: 991px) {
            .site-footer [class^=col-] {
                margin-bottom: 30px;
            }
        }
        @media (max-width: 767px) {
            .site-footer {
                padding-bottom: 0;
            }
            .site-footer .copyright-text, .site-footer .social-icons {
                text-align: center;
            }
        }
        @media (max-width: 767px) {
            .social-icons li.title {
                display: block;
                margin-right: 0;
                font-weight: 600;
            }
        }
    
    </style>

    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <a class="navbar-brand text-black" href="<?php echo APPURL; ?>">SoleStore</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav navbar-center">
                <li class="nav-item">
                    <a class="nav-link active text-black" aria-current="page" href="<?php echo APPURL; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-black" aria-current="page" href="<?php echo APPURL; ?>/categories/index.php">Categories</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['username'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link active text-black" aria-current="page" href="<?php echo APPURL; ?>/shopping/cart.php"><i class="fas fa-shopping-bag"></i>(<?php echo $getNumber->num_products; ?>)</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle text-black" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo $_SESSION['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo APPURL; ?>/users/history.php?id=<?php echo $_SESSION['user_id']; ?>">History</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo APPURL; ?>/auth/logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link active text-black" href="<?php echo APPURL; ?>/auth/login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
