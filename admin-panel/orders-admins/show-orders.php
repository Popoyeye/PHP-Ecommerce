<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

// Redirect to login page if not logged in
if (!isset($_SESSION['username'])) {
    header("location: ".ADMINURL."/admins/login-admins.php");
}


$select = $pdo->query("SELECT * FROM orders ORDER BY create_at DESC");
$select->execute();

$orders = $select->fetchAll(PDO::FETCH_OBJ);

?>
    <div class="row">
        <div class="col">
            <?php if(count($orders) > 0) : ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">Orders</h5>
                    <table class="table">
                        <thead>
                            <tr>

                                <th scope="col">Id</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Item</th>
                                <th scope="col">Price (MYR)</th>
                                <th scope="col">Date & Time</th>
                                <th scope="col">Status</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach( $orders as $order ): ?>
                            <tr>

                                <td><?php echo $order->id; ?></td>
                                <td><?php echo $order->username; ?></td>
                                <td><?php echo $order->email; ?></td>
                                <td><?php echo $order->pro_name; ?></td>
                                <td><?php echo number_format((float)$order->price, 2, '.', ''); ?></td>
                                <td><?php echo $order->create_at; ?></td>
                                <td><?php echo 'completed'; ?></td>

                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <?php else : ?>
                <div class="alert alert-success text-white bg-success">There is no order history</div>
            <?php endif; ?>
        </div>
    </div>



<?php require "../layouts/footer.php"; ?>