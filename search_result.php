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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="" href="styles/style.css">
    <link rel="stylesheet" href="common/style/header_footer.css">


    <title>Online Shop</title>
</head>

<body>
    <?php include('common/header.php') ?>

    <div class="row row-cols-1 row-cols-md-5 g-4 m-3 product_box">
        <?php
if(isset($_GET['search_product'])){
    $keywords = $_GET['Search'];
global $db;
$get_p = "select * from products where product_keywords like '%$keywords%'";
$run_select=mysqli_query($db,$get_p);

$searh_rows= mysqli_num_rows($run_select);
if($searh_rows>0){
while($products=mysqli_fetch_array($run_select)){
 $p_id = $products['product_id'];
 $P_tittle = $products['product_tittle'];
 $P_price = $products['product_price'];
 $P_image = $products['product_image'];
 echo"<div class='col p_container '>
 <div class='card card_item'>
     <img src='admin_area/images/$P_image' class='card-img-top p_image'>
     <div class='card-body'>
         <a class='p_tittle' href='index.php?details=$p_id' class='card-title'>$P_tittle</a>
         <p class='text'>$$P_price</p>
         <a class='cart' type='submit' href='index.php?p_id=$p_id'><i class='bi bi-cart-plus'></i></a>
     </div>
  </div>
</div>";
   }
}else{
    echo"<div class='w-100 text-center my-5'><h2 class='text-dark w-100 text-center my-5'>No Product Found</h2>
    <a  href='index.php' class='btn btn-dark col-sm-4 text-light  home'>back to home </a> </div>";
    
}
}
         ?>
    </div>

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