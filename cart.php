<?php 
include('includes/db.php');
include('function/function.php'); 
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
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="common/style/header_footer.css">


    <title>Online Shop</title>
</head>

<body>
    <?php include('common/header.php') ?>

    <h2 class="cart_heading text-dark">Shoping Cart</h2>

    <?php 
      $ip = getip();
if(isset($_SESSION['customer_email'])){ 
  if (isset($_POST['decrease'])) {
    $p_id = $_POST['id'];
    $c_email = $_SESSION['customer_email'];
    $select_cart = "select * from cart where c_email='$c_email' And p_id='$p_id'";
       $run_cart= mysqli_query($db,$select_cart);
       $cart_row = mysqli_num_rows($run_cart);
       if($cart_row > 0){
       $cart_pro = mysqli_fetch_array($run_cart);
       $qty =$cart_pro['p_quantity'];
       $id= $cart_pro['p_id'];
       if ($qty >1) {
        $qty = $qty - 1;
        $update_cart = "UPDATE `cart` SET `p_quantity`='$qty' WHERE c_email='$c_email' AND p_id='$id'";
        $run_update= mysqli_query($db,$update_cart);
        if ($run_update) {
          echo"<script>window.open('cart.php','_self')</script>";
        }
      }     
   }
 }
}

if(isset($_SESSION['customer_email'])){ 
  if (isset($_POST['increase'])) {
   $c_email = $_SESSION['customer_email'];
   $p_id = $_POST['id'];
    $select_cart = "select * from cart where c_email='$c_email' And p_id='$p_id'";
       $run_cart= mysqli_query($db,$select_cart);
       $cart_row = mysqli_num_rows($run_cart);
       if($cart_row > 0){
       $cart_pro = mysqli_fetch_array($run_cart);
       $qty =$cart_pro['p_quantity'];
       $id=$cart_pro['p_id'];
       if ($qty >0) {
        $qty = $qty + 1 ;
        $update_cart = "UPDATE `cart` SET `p_quantity`='$qty' WHERE c_email='$c_email' AND p_id='$id'";
        $run_update= mysqli_query($db,$update_cart);
        if ($run_update) {
          echo"<script>window.open('cart.php','_self')</script>";
         }
       }     
    }
  }
}

?>

    <?php ?>

    <?php 
      $ip = getip();
if(!isset($_SESSION['customer_email'])){ 
  if (isset($_POST['decrease'])) {
    $p_id = $_POST['id'];
    $select_cart = "select * from cart where c_email=' ' And p_id='$p_id'";
       $run_cart= mysqli_query($db,$select_cart);
       $cart_row = mysqli_num_rows($run_cart);
       if($cart_row > 0){
       $cart_pro = mysqli_fetch_array($run_cart);
       $qty =$cart_pro['p_quantity'];
       $id=$cart_pro['p_id'];
       if ($qty>1) {
        $qty = $qty - 1 ;
        $update_cart = "UPDATE `cart` SET `p_quantity`='$qty' WHERE c_email=' ' AND p_id='$id'";
        $run_update= mysqli_query($db,$update_cart);
        if ($run_update) {
          echo"<script>window.open('cart.php','_self')</script>";
        }
      }       
    }
  }
}



if(!isset($_SESSION['customer_email'])){ 
  if (isset($_POST['increase'])) {
   $p_id = $_POST['id'];
    $select_cart = "select * from cart where c_email=' ' And p_id='$p_id'";
       $run_cart= mysqli_query($db,$select_cart);
       $cart_row = mysqli_num_rows($run_cart);
       if($cart_row > 0){
       $cart_pro = mysqli_fetch_array($run_cart);
       $qty =$cart_pro['p_quantity'];
       $id=$cart_pro['p_id'];
       if ($qty > 0) {
        $qty = $qty + 1 ;
        $update_cart = "UPDATE `cart` SET `p_quantity`='$qty' WHERE c_email=' ' AND p_id='$id'";
        $run_update= mysqli_query($db,$update_cart);
        if ($run_update) {
          echo"<script>window.open('cart.php','_self')</script>";
        }
       }     
    }
  }
}
?>

    <?php
if(!isset($_SESSION['customer_email'])){ 
if(isset($_POST['remove'])){
  $p_id = $_POST['id'];
  $select_cart = "select * from cart where c_email=' ' And p_id='$p_id'";
     $run_cart= mysqli_query($db,$select_cart);
     $cart_row = mysqli_num_rows($run_cart);
     if($cart_row == 1){
      $delete_cart = "DELETE FROM `cart` WHERE c_email=' ' AND p_id='$p_id'";
      $run_delete= mysqli_query($db,$delete_cart);
      if ($run_delete) {
        echo"<script>window.open('cart.php','_self')</script>";
       }
     }     
   }
 }

?>

    <?php
if(isset($_SESSION['customer_email'])){ 
if(isset($_POST['remove'])){
  $c_email= $_SESSION['customer_email'];
  $p_id = $_POST['id'];
  $select_cart = "select * from cart where c_email='$c_email' And p_id='$p_id'";
     $run_cart= mysqli_query($db,$select_cart);
     $cart_row = mysqli_num_rows($run_cart);
     if($cart_row == 1){
      $delete_cart = "DELETE FROM `cart` WHERE c_email='$c_email' AND p_id='$p_id'";
      $run_delete= mysqli_query($db,$delete_cart);
      if ($run_delete) {
        echo"<script>window.open('cart.php','_self')</script>";
       }
     }     
   }
 }

?>

    <?php 
     $ip = getip();
     
     if(isset($_SESSION['customer_email'])){
       $c_email = $_SESSION['customer_email'];
       $select_cart = "select * from cart where c_email='$c_email' And ip_add='$ip'";
       $run_cart= mysqli_query($db,$select_cart);
       $cart_row = mysqli_num_rows($run_cart);
       if($cart_row > 0){
        while($cart_pro = mysqli_fetch_array($run_cart)){
          $p_id= $cart_pro['p_id'];
          $qty=$cart_pro['p_quantity'];
    $get_p = "select * from products where product_id='$p_id'";
    $run_get=mysqli_query($db,$get_p);
    $products=mysqli_fetch_array($run_get);
    $P_tittle = $products['product_tittle'];
    $P_price = $products['product_price'];
    $P_image = $products['product_image'];
    echo"
    <div class='card col' style='max-width:540px; margin: 50px auto;'>
    <div class='row g-0 mx-auto'>
      <div class='col-md-5 p-4 text-center my-auto' >
        <img src='admin_area/images/$P_image' class='img-fluid rounded-start' width='300' height='400'>
      </div>
      <div class='col-md-7 p-2'>
        <div class='card-body text-center'>
        <a class='p_tittle'  href='detail.php?p_id=$p_id' class='card-title'>$P_tittle</a>
          <p class='text'>$$P_price</p>
          <form class='form my-3' action='cart.php' method='POST'>
          <input type='hidden' value='$p_id' name='id'/>
          <input type='submit' class='p-2 ' value='-1' name='decrease'/>
          <input type='text' class='text-center p-2' value='$qty' style='width:40px;' readonly/>
          <input type='submit' class='p-2' value='+1' name='increase'/>
          <div id='buttons'>
          <p class='card-text'><small><input type='submit' class='btn btn-outline-danger p-1 mt-4 mx-2' value='Remove' name='remove'/></p>
          </form>
          
          <form class='form' action='checkout.php' method='POST'>
          <input type='hidden' value='$p_id' name='id'/>
          
          <input id='checkout' type='submit' class='btn btn-outline-success p-1 mt-4' name='checkout' value='Checkout'/></small>
          </div>
          </form>
        </div>
      </div>
    </div>
    </div>
  ";

        }
     }else{
       echo"";
      }
    }
 
    if(!isset($_SESSION['customer_email'])){
     $select_cart = "select * from cart where c_email='' And ip_add='$ip'";
     $run_cart= mysqli_query($db,$select_cart);
     $cart_row = mysqli_num_rows($run_cart);
     if($cart_row > 0){
        while($cart_pro = mysqli_fetch_array($run_cart)){
          $p_id= $cart_pro['p_id'];
           $qty=$cart_pro['p_quantity'];
     $get_p = "select * from products where product_id='$p_id'";
     $run_get=mysqli_query($db,$get_p);
     $products=mysqli_fetch_array($run_get);
     $P_tittle = $products['product_tittle'];
     $P_price = $products['product_price'];
     $P_image = $products['product_image'];
     echo"
     <div class='card col' style='max-width:540px; margin: 50px auto;'>
     <div class='row g-0 mx-auto'>
       <div class='col-md-5 p-4 text-center my-auto' >
         <img src='admin_area/images/$P_image' class='img-fluid rounded-start' width='300' height='400'>
       </div>
       <div class='col-md-7 p-0'>
         <div class='card-body  text-center'>
           <h5 class='card-title'>$P_tittle</h5>
           <p class='text'>$$P_price</p>
           <form class='form my-3' action='cart.php' method='POST'>
           <input type='hidden' value='$p_id' name='id'/>
           <input type='submit' class='p-2 ' value='-1' name='decrease'/>
           <input type='text' class='text-center p-2' value='$qty' style='width:40px;' readonly/>
           <input type='submit' class='p-2' value='+1' name='increase'/>
           <div id='buttons'>
           <p class='card-text'><small><input type='submit' class='btn btn-outline-danger p-1 mt-4 mx-2' value='Remove' name='remove'/></p>
           </form>
           
           <form class='form' action='checkout.php' method='POST'>
           <input type='hidden' value='$p_id' name='id'/>
           
           <input id='checkout' type='submit' class='btn btn-outline-success p-1 mt-4' name='checkout' value='Checkout'/></small>
           </div>
           </form>
           </div>
       </div>
     </div>
     </div>
   ";
   }
   }else{
    echo"";
   }
}
    ?>


    <form method="POST" action="checkout.php">
        <div id='price' class=' text-center '>

            <?php
   $ip = getip();
   if(!isset($_SESSION['customer_email'])){
    $t_price=0; 
    $select_cart = "select * from cart where c_email='' And ip_add='$ip'";
    $run_cart= mysqli_query($db,$select_cart);
    $cart_row = mysqli_num_rows($run_cart);
    if($cart_row > 0){
       while($cart_pro = mysqli_fetch_array($run_cart)){
    $p_id= $cart_pro['p_id'];
    $qty=$cart_pro['p_quantity'];
    $get_p = "select * from products where product_id='$p_id'";
    $run_get=mysqli_query($db,$get_p);
    $products=mysqli_fetch_array($run_get);
    $P_price = $products['product_price'];

    $t_price=$t_price + ($P_price*$qty);

       }
      }
      echo"<p style='margin:0;  padding: 10px 20px; border-right: 1px solid grey; text-align:center;'> Total Price: $$t_price </p> <input type='submit' style='border-right:1px solid grey;' class='btn btn-outline-success p-1 m-1' name='checkout_all' value='Checkout'/>
      ";
    }


   ?>
            <?php
   $ip = getip();
   if(isset($_SESSION['customer_email'])){
    $t_price=0; 
    $c_email= $_SESSION['customer_email'];
    $select_cart = "select * from cart where c_email='$c_email' And ip_add='$ip'";
    $run_cart= mysqli_query($db,$select_cart);
    $cart_row = mysqli_num_rows($run_cart);
    if($cart_row > 0){
       while($cart_pro = mysqli_fetch_array($run_cart)){
    $p_id= $cart_pro['p_id'];
    $qty=$cart_pro['p_quantity'];
    $get_p = "select * from products where product_id='$p_id'";
    $run_get=mysqli_query($db,$get_p);
    $products=mysqli_fetch_array($run_get);
    $P_price = $products['product_price'];
    $t_price=$t_price + ($P_price*$qty);

       }
      }
      echo"<p style='margin:0; padding: 10px 20px; border-right: 1px solid grey; text-align:center;'> Total Price: $$t_price </p> <input type='submit' style='border-right:1px solid grey;' class='btn btn-outline-success p-1 m-1' name='checkout_all' value='Checkout'/>
      ";
    }

   ?>
        </div>
    </form>



    <?php include('common/footer.php') ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
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