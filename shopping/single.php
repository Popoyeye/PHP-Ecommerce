<?php require "../includes/header.php"; ?>
<?php require "../config/config.php"; ?>

<?php

if (isset($_POST['submit'])) {
    $pro_id     = $_POST['pro_id'];
    $pro_name   = $_POST['pro_name'];
    $pro_image  = $_POST['pro_image'];
    $pro_price  = $_POST['pro_price'];
    $pro_amount = $_POST['pro_amount'];
    $pro_file   = $_POST['pro_file'];
    $user_id    = $_POST['user_id'];

    $insert = $pdo->prepare("INSERT INTO cart (pro_id, pro_name, pro_image, pro_price, pro_amount, pro_file, user_id) 
    VALUES (:pro_id, :pro_name, :pro_image, :pro_price, :pro_amount, :pro_file, :user_id)");

    $insert->execute([

        ':pro_id' => $pro_id,
        ':pro_name'=> $pro_name,
        ':pro_image'=> $pro_image,
        ':pro_price'=> $pro_price,
        ':pro_amount'=> $pro_amount,
        ':pro_file'=> $pro_file,
        ':user_id' => $user_id,

    ]);

}

if (isset($_GET["id"])) {
    
    $id = $_GET["id"];

    //checking for product in cart
    if(isset($_SESSION['user_id'])){
        $select = $pdo->query("SELECT * FROM cart WHERE pro_id = '$id' AND user_id='$_SESSION[user_id]'");
        $select->execute();
    }
    

    //getting data for every product
    $row = $pdo->query("SELECT * FROM products WHERE status = 1 AND id='$id'");
    $row->execute();

    $product = $row->fetch(PDO::FETCH_OBJ);

} else {
    header("location: ".APPURL."/404.php");
}



?>

        <div class="row d-flex justify-content-center mt-4">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-5 mt-5">
                            <div class="images p-3">
                                <div class="text-center p-4"> <img id="main-image" src="<?php echo IMGURL; ?><?php echo $product->image; ?>" width="250" /> </div>
                            </div>
                        </div>
                        <div class="col-md-6 mt-5">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"> <a href="<?php echo APPURL; ?>" class="ml-1 btn btn-primary"><i class="fa fa-long-arrow-left"></i> Homepage</a></div>
                                <i class="fa fa-shopping-cart text-muted"></i>
                                </div>
                                <div class="mt-4 mb-3">
                                    <h5 class="text-uppercase"><?php echo $product->name; ?></h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price">MYR<?php echo $product->price; ?></span>
                                    </div>
                                </div>
                                <p class="about"><?php echo $product->description; ?></p>

                                <form method="post" id="form-data">
                                    <div class="">
                                    <input type="hidden" name="pro_id" value="<?php echo $product->id; ?>" class="form-control" >
                                    </div>
                                    <div class="">
                                    <input type="hidden" name="pro_name" value="<?php echo $product->name; ?>" class="form-control" >
                                    </div>
                                    <div class="">
                                    <input type="hidden" name="pro_image" value="<?php echo $product->image; ?>" class="form-control" >
                                    </div>
                                    <div class="">
                                    <input type="hidden" name="pro_price" value="<?php echo $product->price; ?>" class="form-control" >
                                    </div>
                                    <div class="">
                                    <input type="hidden" name="pro_amount" value="1" class="form-control" >
                                    </div>
                                    <div class="">
                                    <input type="hidden" name="pro_file" value="<?php echo $product->file; ?>" class="form-control">
                                    </div>
                                    <?php if(isset($_SESSION["user_id"])) : ?>
                                        <div class="">
                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" class="form-control">
                                        </div>
                                    <?php endif; ?>
                                    <div class="cart mt-4 align-items-center">
                                    <?php if(isset($_SESSION['user_id'])) : ?>
                                        <?php if($select->rowCount() > 0) : ?>
                                            <button id="submit" name="submit" type="submit" disabled class="btn btn-primary text-uppercase mr-2 px-4"><i class="fas fa-shopping-cart"></i> Added to cart</button>
                                        <?php else : ?>
                                            <button id="submit" name="submit" type="submit" class="btn btn-primary text-uppercase mr-2 px-4"><i class="fas fa-shopping-cart"></i> Add to cart</button>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<?php require "../includes/footer.php"; ?>

<script>

    $(document).ready(function(){
        
        $(document).on("submit", function(e) {

            e.preventDefault();
            var formdata = $("#form-data").serialize()+'&submit=submit';

            $.ajax({
                type: "post",
                url: "single.php?id=<?php echo $id; ?>",
                data: formdata,

                success: function(){
                    alert("added to cart successfully!");
                    $("#submit").html("<i class='fas fa-shopping-cart'></i> Added to cart").prop("disabled", true);
                    refresh();
                }
            });

            function refresh() {
                $("body").load("single.php?id=<?php echo $id; ?>")
            }
        })
    });
    
</script>
