<?php 
session_start();

function sentenceCase($string) { 
    $sentences = preg_split('/([.?!]+)/', $string, -1,PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE); 
    $newString = ''; 
    foreach ($sentences as $key => $sentence) { 
        $newString .= ($key & 1) == 0? 
            ucfirst(strtolower(trim($sentence))) : 
            $sentence.' '; 
    } 
    return trim($newString); 
}

function getCat(){
    global $db;
    $getcat = "select * from categories";
    $run_select = mysqli_query($db,$getcat);
    while($cat = mysqli_fetch_array($run_select)){
        $cat_id = $cat['cat_id'];
        $cat_tittle = $cat['cat_tittle'];
       echo"<li><a class='category' href='index.php?cat=$cat_id'>$cat_tittle</a></li>";
    }
}

function getBrand(){
    global $db;
    $getbrand = "select * from brand";
        $run_select = mysqli_query($db,$getbrand);
       while($brand = mysqli_fetch_array($run_select)){
          $brand_id = $brand['brand_id'];
          $brand_tittle = $brand['brand_tittle'];
           echo"<li><a class='brands' href='index.php?brand=$brand_id'>$brand_tittle</a></li>";
    }
}

function getProduct(){
  if(!isset($_GET['cat'])){
    if(!isset($_GET['brand'])){
    global $db;
    $get_p = "select * from products ORDER BY RAND() LIMIT 8";
    $run_select=mysqli_query($db,$get_p);
    while($products=mysqli_fetch_array($run_select)){
     $p_id = $products['product_id'];
     $P_tittle = $products['product_tittle'];
     $P_price = $products['product_price'];
     $P_image = $products['product_image'];
     echo"<div class='col p_container '>
     <div class='card card_item'>
         <img src='admin_area/images/$P_image' class='card-img-top p_image'>
         <div class='card-body'>
             <a class='p_tittle' href='detail.php?p_id=$p_id' class='card-title'>$P_tittle</a>
             <p class='text'>$$P_price</p>
             <a class='cart' type='submit' href='index.php?add_cart=$p_id'><i class='bi bi-cart-plus'></i></a>
         </div>
      </div>
    </div>";
    }
   }
  }
}

function getip(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
  return $ip_address;
}

function getByCat(){
  if(isset($_GET['cat'])){  
    global $db;
    $p_catid = $_GET['cat'];

    $get_cat_p = "select * from products where product_cat='$p_catid'";
    $run_select=mysqli_query($db,$get_cat_p);

    $cat_row = mysqli_num_rows($run_select);

    if($cat_row>0){
    while($products=mysqli_fetch_array($run_select)){
     $cat_p_id = $products['product_id'];
     $cat_P_tittle = $products['product_tittle'];
     $cat_P_price = $products['product_price'];
     $cat_P_image = $products['product_image'];
     echo"<div class='col p_container'>
     <div class='card card_item'>
         <img src='admin_area/images/$cat_P_image' class='card-img-top p_image'>
         <div class='card-body'>
             <a class='p_tittle' href='detail.php?p_id=$cat_p_id' class='card-title'>$cat_P_tittle</a>
             <p class='text'>$$cat_P_price</p>
             <a class='cart' type='submit'  href='index.php?add_cart=$cat_p_id'><i class='bi bi-cart-plus'></i></a>
         </div>
      </div>
    </div>";
    }
  }else{
    echo"<div class='w-100 text-center my-5'><h2 class='text-dark w-100 text-center my-5'>No Product Related To This Category</h2>
    <a  href='index.php' class='btn btn-dark col-sm-4 text-light  home'>back to home </a> </div>";
  }
   
  }
}


function getBybrand(){
  if(isset($_GET['brand'])){  
    global $db;
    $p_brandid = $_GET['brand'];

    $get_brand_pro = "select * from products where product_brand ='$p_brandid'";
    $run_select=mysqli_query($db,$get_brand_pro );
  
    $brand_row = mysqli_num_rows($run_select);

    if($brand_row>0){

    while($products=mysqli_fetch_array($run_select)){
     $brand_P_id = $products['product_id'];
     $brand_p_tittle = $products['product_tittle'];
     $brand_P_price = $products['product_price'];
     $brand_P_image = $products['product_image'];
     echo"<div class='col p_container '>
     <div class='card card_item'>
         <img src='admin_area/images/$brand_P_image' class='card-img-top p_image'>
         <div class='card-body'>
             <a class='p_tittle'  href='detail.php?p_id=$brand_P_id' class='card-title'>$brand_p_tittle</a>
             <p class='text'>$$brand_P_price</p>
             <a class='cart' type='submit'href='index.php?add_cart=$brand_P_id'><i class='bi bi-cart-plus'></i></a>
         </div>
      </div>
    </div>";
     }
   }else{
    echo"<div class='w-100 text-center my-5'><h2 class='text-dark w-100 text-center my-5'>No Product Related To This Brand</h2>
    <a  href='index.php' class='btn btn-dark col-sm-4 text-light  home'>back to home </a> </div>";
   }
  }
}

function addcart(){
  global $db;
  if(isset($_GET['add_cart'])){
    $p_id =$_GET['add_cart'];
    $ip = getip();
    
    if(isset($_SESSION['customer_email'])){
      $c_email = $_SESSION['customer_email'];
      $select_cart = "select * from cart where c_email='$c_email' And p_id='$p_id'";
      $run_cart= mysqli_query($db,$select_cart);
      $cart_row = mysqli_num_rows($run_cart);
      if($cart_row == 0){
      $insert_cart = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_email`, `p_quantity`) VALUES ('$p_id','$ip','$c_email','1')";
      $run_query= mysqli_query($db,$insert_cart);
      if($run_query){
        echo"<script>window.open('index.php','_self')</script>";
        }
    }else{
      echo"";
     }
   }

   if(!isset($_SESSION['customer_email'])){
    $select_cart = "select * from cart where c_email=' ' And p_id='$p_id'";
    $run_cart= mysqli_query($db,$select_cart);
    $cart_row = mysqli_num_rows($run_cart);
    if($cart_row == 0){
    $insert_cart = "INSERT INTO `cart`(`p_id`, `ip_add`, `c_email`, `p_quantity`) VALUES ('$p_id','$ip',' ','1')";
    $run_query= mysqli_query($db,$insert_cart);
    if($run_query){
    echo"<script>window.open('index.php','_self')</script>";
    }
  }else{
    echo"";
   }
 }
  }
}

?>