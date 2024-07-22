<?php

ob_start(); // Start output buffering

// Include header and configuration files
require "../includes/header.php";
require "../config/config.php";


// Redirect if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: ".APPURL."");
    exit(); // Make sure to exit after redirection
}

// Check if the form is submitted
if (isset($_POST["submit"])) {

    // Validate form inputs
    if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"])) {
        echo "<script>alert('One or more inputs are empty');</script>";
    } else {
        // Sanitize and assign form inputs
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash the password

        // Insert the new user into the database
        $insert = $pdo->prepare("INSERT INTO users (username, email, mypassword) VALUES (:username, :email, :mypassword)");

        $insert->execute([
            ':username' => $username,
            ':email' => $email,
            ':mypassword' => $password
        ]);

        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        // Redirect to home page after successful registration
        header("location: login.php");
        exit(); // Make sure to exit after redirection
    }
}

ob_end_flush(); // Flush the output buffer

?>

<div class="row justify-content-center mb-4 mt-4">
    <div class="col-md-6">
        <form class="form-control mt-5" method="POST" action="register.php">
            <h4 class="text-center mt-3"> Register </h4>
            <div class="form-group">
                <label for="username" class="col-form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" value="">
            </div>
            <div class="form-group">
                <label for="email" class="col-form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="">
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-form-label">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword">
            </div>
            <button name="submit" class="w-100 btn btn-lg btn-primary mt-4 mb-4" type="submit">Register</button>
        </form>
    </div>
</div>

<?php require "../includes/footer.php"; ?>
