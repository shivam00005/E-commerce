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

    <?php 
    if(isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];
        global $db;
        $get_p = "select * from products where product_id='$p_id'";
        $run_select=mysqli_query($db,$get_p);
        while($products=mysqli_fetch_array($run_select)){
         $P_desc = $products['product_desc'];
         $P_tittle = $products['product_tittle'];
         $P_price = $products['product_price'];
         $P_image = $products['product_image'];

         echo"<div class='card' style='max-width: 1000px; margin: 50px auto;'>
         <div class='row g-0'>
           <div class='col-md-5 p-4 text-center'>
             <img src='admin_area/images/$P_image' class='img-fluid rounded-start' width='300' height='400'>
           </div>
           <div class='col-md-7'>
             <div class='card-body'>
               <h5 class='card-title'>$P_tittle</h5>
               <p class='text'>$$P_price</p>
               <p class='text'>$P_desc</p>
             <p class='card-text'><small><a class='p_tittle text-muted' href='index.php'>Home</a></small></p>
             </div>
           </div>
         </div>
       </div>";

    }
}

    ?>



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