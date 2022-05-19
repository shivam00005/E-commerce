<?php 
include('includes/db.php');
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="" href="styles/style.css">
    <link rel="stylesheet" href="common/style/header_footer.css">


    <title>Online Shop</title>
</head>

<body>

    <div class='card' style='max-width: 700px; margin: 40px auto; padding-bottom:10px; text-align:center;'>
        <h2 class="text-light text-center mb-3 bg-dark p-2">Procced To Buy</h2>
        <?php 
if(isset($_SESSION['customer_email'])){
if(isset($_POST['checkout_all'])){
 $t_price=0;
$c_email= $_SESSION['customer_email'];
  $select_cart = "select * from cart where c_email='$c_email'";
     $run_cart= mysqli_query($db,$select_cart);

     while( $cart_row = mysqli_fetch_array($run_cart)){
         $p_id = $cart_row['p_id'];
         $qty = $cart_row['p_quantity'];
         $get_p = "select * from products where product_id='$p_id'";
         $run_select=mysqli_query($db,$get_p);
         echo"";
         while($products=mysqli_fetch_array($run_select)){
          $P_tittle = $products['product_tittle'];
          $P_price = $products['product_price'];
          $P_image = $products['product_image'];
        
          echo" <div class='row g-0'>
            <div class='col-md-5 p-4 text-center'>
              <img src='admin_area/images/$P_image' class='img-fluid rounded-start' width='100' height='100'>
            </div>
            <div class='col-md-7'>
              <div class='card-body float-right'>
                <h5 class='card-title'>$P_tittle</h5>
                <p class='text'>Quanity: $qty</p>
                <p class='text'>$$P_price</p>
              </div>
            </div>
          </div>
    ";
        
        
     }  
     $t_price=$t_price + ($P_price*$qty);
   }

   echo"<p style='margin:0; padding: 10px 20px; text-align:center;'> Total Price: $$t_price </p> 
   ";
 }

}else{
    echo"<script>window.open('register.php','_self')</script>";
}

  ?>

        <?php 
if(isset($_SESSION['customer_email'])){
  if(isset( $_POST['checkout'])){
    $p_id = $_POST['id'];
   $t_price=0;
  $c_email= $_SESSION['customer_email'];
    $select_cart = "select * from cart where c_email='$c_email' And p_id='$p_id' ";
       $run_cart= mysqli_query($db,$select_cart);
       $cart_row = mysqli_fetch_array($run_cart);
           $qty = $cart_row['p_quantity'];
           $get_p = "select * from products where product_id='$p_id'";
           $run_select=mysqli_query($db,$get_p);
            $products=mysqli_fetch_array($run_select);
            $P_tittle = $products['product_tittle'];
            $P_price = $products['product_price'];
            $P_image = $products['product_image'];
          
            echo" <div class='row g-0'>
              <div class='col-md-5 p-4 text-center'>
                <img src='admin_area/images/$P_image' class='img-fluid rounded-start' width='100' height='100'>
              </div>
              <div class='col-md-7'>
                <div class='card-body float-right'>
                  <h5 class='card-title'>$P_tittle</h5>
                  <p class='text'>Quanity: $qty</p>
                  <p class='text'>$$P_price</p>
                </div>
              </div>
            </div>
      "; 
       
       $t_price=$t_price + ($P_price*$qty);
     
  
     echo"<p style='margin:0; padding: 10px 20px; text-align:center;'> Total Price: $$t_price </p> 
     ";
   }
  }else{
      echo"<script>window.open('register.php','_self')</script>";
  }
  
?>

    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class='card' style='max-width: 700px; margin: 50px auto;  text-align:center;'>
            <h2 class="text-light text-center mb-3 bg-dark p-2"> Payment </h2>
            <div class="row  my-auto">
                <label for="inputpayment" class="col-sm-4 col-form-label">Select Payment Method</label>
                <div class="col-sm-7">
                    <form action="" method="POST">
                        <select class="form-select" name="customer_pay" id="inputpayment" required>
                            <option>Choose Here</option>
                            <option value="credit">Credit Card</option>
                            <option value="debit">Debit Card</option>
                            <option value="COD">Cash On Delivery</option>
                        </select>
                    </form>
                </div>
                <input type='submit' style='width:200px; margin:20px auto;'
                    class='btn btn-outline-success p-1 text-center' name='paynow' value='Pay Now' />
            </div>
        </div>
    </form>


    <?php 
    if(isset($_POST['paynow'])){
        echo"<script>alert('Items ordered, Thankyou!!')</script>";
        echo"<script>window.open('index.php','_self')</script>";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->

</body>

</html>