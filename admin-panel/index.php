<?php require "layouts/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

$orders = $pdo->query("SELECT COUNT(*) as orders_num FROM orders");
$orders->execute();
$allOrders = $orders->fetch(PDO::FETCH_OBJ);

$products = $pdo->query("SELECT COUNT(*) as products_num FROM products");
$products->execute();
$allProducts = $products->fetch(PDO::FETCH_OBJ);

$categories = $pdo->query("SELECT COUNT(*) as categories_num FROM categories");
$categories->execute();
$allCategories = $categories->fetch(PDO::FETCH_OBJ);

$admins = $pdo->query("SELECT COUNT(*) as admins_num FROM admins");
$admins->execute();
$allAdmins = $admins->fetch(PDO::FETCH_OBJ);

?>
            
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Products</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">number of products: <?php echo $allProducts->products_num; ?></p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Categories</h5>
              
              <p class="card-text">number of categories: <?php echo $allCategories->categories_num; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Admins</h5>
              
              <p class="card-text">number of admins: <?php echo $allAdmins->admins_num; ?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">orders</h5>
              
              <p class="card-text">number of orders: <?php echo $allOrders->orders_num; ?></p>
              
            </div>
          </div>
        </div>
      </div>
  
          
<?php require "layouts/footer.php"; ?>
