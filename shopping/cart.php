<?php

ob_start(); // Start output buffering

require "../includes/header.php";
require "../config/config.php";


if (!isset($_SESSION['username'])) {
  header("location: ".APPURL."");
}

$product = $pdo->query("SELECT * FROM cart WHERE user_id = '$_SESSION[user_id]'");
$product->execute();

$allProducts = $product->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['submit'])) {

  $price = $_POST['price'];

  $_SESSION['price'] = $price;

  header("location: checkout.php");


}

ob_end_flush(); // Flush the output buffer

?>






    <div class="row d-flex justify-content-center align-items-center h-100 mt-5 mt-5">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                    <!-- <h6 class="mb-0 text-muted">2 items</h6> -->
                  </div>


                  <table class="table" height="190" width="300px" >
                    <thead>
                      <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Confirm</th>
                        <th scope="col"><button class="delete-all btn btn-danger text-white">Clear All</button></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(count($allProducts) > 0) : ?>
                        <?php foreach ($allProducts as $product) : ?>
                          <tr class="mb-4">
                            <td><img width="100" height="100"
                            src="<?php echo IMGURL; ?><?php echo $product->pro_image; ?>"class="img-fluid rounded-3" alt="Cotton T-shirt">
                            </td>
                            <td><?php echo $product->pro_name; ?></td>
                            <td class="pro_price">MYR<?php echo $product->pro_price; ?></td>
                            <td><input id="form1" min="1" name="quantity" value="<?php echo $product->pro_amount; ?>" type="number"
                            class="form-control form-control-sm pro_amount" /></td>
                            <td class="total_price">MYR<?php echo number_format($product->pro_price * $product->pro_amount, 2); ?></td>
                            <td><button value="<?php echo $product->id; ?>" class="btn-update btn btn-warning text-white"><i class="fas fa-pen"></i> </button></td>
                            
                            <td><button value="<?php echo $product->id; ?>" class="btn btn-danger text-white btn-delete"><i class="fas fa-trash-alt"></i> </button></td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else : ?>
                        <div class="alert alert-danger bg-danger text-white">
                          There is no products in cart!
                        </div>
                      <?php endif; ?>
                    </tbody>
                  </table>
                  <a href="<?php echo APPURL; ?>" class="btn btn-success text-white"><i class="fas fa-arrow-left"></i>  Continue Shopping</a>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                  <hr class="my-4">

                  
                  <form method="POST" action="cart.php">
                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5 class="full_price"></h5>
                      <input class="input_price" name="price" type="hidden">
                    </div>

                    <button type="submit" name="submit" class="checkout btn btn-dark btn-block btn-lg"
                      data-mdb-ripple-color="dark">Checkout</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
  

<?php require "../includes/footer.php"; ?>

<script>

  $(document).ready(function(){
    
    $(".pro_amount").mouseup(function () {
                  
      var $el = $(this).closest('tr');
      var pro_amount = $el.find(".pro_amount").val();
      var pro_price = ($el.find(".pro_price").html().replace('MYR', ''));
      var total = pro_amount * pro_price;
                  
      $el.find(".total_price").html('MYR' + total.toFixed(2));
      
        $(".btn-update").on('click', function(e) {

            var id = $(this).val();

            $.ajax({
              type: "POST",
              url: "update-item.php",

              data: {
                update: "update",
                id: id,
                pro_amount: pro_amount
              },

            success: function() {
               // alert("done");
              reload();
            }
            })

        });

      fetch();
    });



    $(".btn-delete").on('click', function(e) {

      var id = $(this).val();

      $.ajax({
        type: "POST",
        url: "delete-item.php",

        data: {
          delete: "delete",
          id: id,
          
        },

        success: function() {
        alert("product deleted successfully!");
        reload();
        }
      })

    });

    
    
    $(".delete-all").on('click', function(e) {

      $.ajax({
        type: "POST",
        url: "delete-all-item.php",

        data: {
          delete: "delete",
          
        },

        success: function() {
        alert("all products deleted successfully!");
        reload();
        }
      })

    });

      fetch();

      function fetch() {

      setInterval(function () {
        var sum = 0.0;
        $('.total_price').each(function()
      
        {
          sum += parseFloat($(this).text().replace('MYR', ''));
        });
      
        $(".full_price").html('MYR'+sum.toFixed(2));
        $(".input_price").val(sum.toFixed(2));

        if($(".input_price").val() > 0) {
          $(".checkout").show();
        } else{
          $(".checkout").hide();
        }

      }, 4000);

      }
      
      function reload() {
        $("body").load("cart.php")
      }
  })
</script>