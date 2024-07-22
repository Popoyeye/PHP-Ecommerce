<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

$select = $pdo->query("SELECT * FROM categories");
$select->execute();

$categories = $select->fetchAll(PDO::FETCH_OBJ);

?>

<div class="row mt-5">

<?php foreach ($categories as $category): ?>
    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 mb-4">
        <div class="card h-100">
            <img height="500px" class="card-img-top" src="http://localhost/bookstore/admin-panel/categories-admins/images/<?php echo $category->image; ?>">
                <div class="card-body" >
                    <h5><b><?php echo $category->name; ?></b> </h5>
                    <div class="d-flex flex-row my-2">
                        <div class="text-muted"><?php echo $category->description; ?></div>
                    </div>
                    <a href="<?php echo APPURL; ?>/categories/single-category.php?id=<?php echo $category->id; ?>" class="btn btn-primary w-100 rounded my-2">Discover Products</a>
                </div>
        </div>
    </div>
    <br>
<?php endforeach; ?>

</div>



<?php require "../includes/footer.php"; ?>
