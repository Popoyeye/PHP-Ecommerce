<?php

ob_start(); // Start output buffering

require "includes/header.php";
require "config/config.php";



if (!isset($_SERVER['HTTP_REFERER'])){
    header('location: index.php');
    exit;
}

if(!isset($_SESSION['username'])) {
    header("location: ".APPURL."");
}

// Set the timezone to Malaysia Time
date_default_timezone_set('Asia/Kuala_Lumpur');

// Retrieve the amount paid from the session
$amountPaid = isset($_SESSION['amount_paid']) ? $_SESSION['amount_paid'] : 0.00;

ob_end_flush(); // Flush the output buffer

?>

        <div class="d-flex align-items-center justify-content-center vh-100">
            <div class="text-center">
                <h1 class="mt-4 text-2xl font-semibold">Payment Successful</h1>
                <p class="mt-2 text-gray-500 dark:text-gray-400">Thank You for your purchase!</p>
                <div class="mt-6 border rounded-lg p-4 w-full max-w-md">
                    <div class="flex justify-between text-sm">
                        <span>Amount Paid:</span>
                        <span class="input">MYR<?php echo number_format($amountPaid, 2); ?></span>
                    </div>
                    <div class="flex justify-between text-sm mt-2">
                        <span>Date & Time:</span>
                        <span class="font-medium"><?php echo date("F j, Y, g:i A"); ?></span>
                    </div>
                </div>
                <div class="mt-8 inline-flex items-center justify-center h-10 px-4 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"> <a href="<?php echo APPURL; ?>"></i>Return to Homepage</a></div>
            </div>
        </div>

        <footer className="flex items-center justify-center h-14 border-t">
        <p className="text-sm text-gray-500 dark:text-gray-400">&copy; 2024 Acme Inc. All rights reserved.</p>
        </footer>
        

