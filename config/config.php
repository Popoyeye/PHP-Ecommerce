<?php


$dsn = 'mysql:host=localhost;dbname=bookstore';
$username = 'root';  // MySQL username
$password = 'admin';      // MySQL password


$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// try {
//     $pdo = new PDO($dsn, $username, $password);
//     // Other PDO settings
// } catch (PDOException $e) {
//     echo 'Connection failed: ' . $e->getMessage();
// }

// if($pdo) {
//     echo "worked succesfully!";
// } else {
//     echo "error in db connection";
// }
