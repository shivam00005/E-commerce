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
    <link rel="stylesheet" href="common/style/header_footer.css">
    <link rel="stylesheet" href="styles/my_account.css">

    <title>Online Shop</title>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark header">
        <div class="container-fluid">
            <a class="navbar-brand text-light">Welcome To My Online Shop</a>
            <form class="d-flex" action="search_result.php" method="GET">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="Search">
                <button class="btn btn-outline-success" type="submit" name="search_product">Search</button>
            </form>
        </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar2">
        <div class="container-fluid">
            <button class="navbar-toggler burger_icon" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon "></span>
            </button>
            <div class="collapse navbar-collapse navbar-links-box" id="navbarSupportedContent">
                <ul class="navbar-nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="all_product.php">All Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my_account.php">My Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about_us.php">Abou Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart <span
                                class=" translate-end badge rounded-pill bg-primary">
                                <?php 
                            $ip = getip();
                if(!isset($_SESSION['customer_email'])){
                    
                    $select_cart = "select * from cart where c_email=' ' And ip_add='$ip'";
                       $run_cart= mysqli_query($db,$select_cart);
                       $cart_row = mysqli_num_rows($run_cart);
                       echo"$cart_row";
                }
                if(isset($_SESSION['customer_email'])){
                    
                    $c_email=$_SESSION['customer_email'];
                    $select_cart = "select * from cart where c_email='$c_email' And ip_add='$ip'";
                    $run_cart= mysqli_query($db,$select_cart);
                    $cart_row = mysqli_num_rows($run_cart);
                    echo"$cart_row";
                }
                ?>

                            </span></a>
                    </li>
                    <?php 
                if(!isset($_SESSION['customer_email'])){
                    echo'<li class="nav-item login">
                    <a class="nav-link text-success" href="login.php">Login</a>
                </li>
                <li class="nav-item signup">
                    <a class="nav-link text-success " href="register.php">Sign Up</a>
                </li>';
            }
            if(isset($_SESSION['customer_email'])){
               echo'<li class="nav-item signup">
               <a class="nav-link text-success " href="logout.php">Logout</a>
           </li>'; 
            }
                ?>
                </ul>
            </div>
            <a class="nav-link text-success" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"
                aria-controls="offcanvas">Filter</a>
            <a class="nav-link text-success profile_button" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasprofile" aria-controls="offcanvasprofile">Profile</a>
        </div>

    </nav>

    <div class="offcanvas offcanvas-end offcanvas-dark bg-dark sidebar" data-bs-scroll="true" tabindex="-1"
        id="offcanvas" aria-labelledby="offcanvas">
        <div class="container-fluid offcanvas-header">
            <h5 id="offcanvas">Filter</h5>
            <button type="button" class="btn-close btn-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mb-5">
                <h2>Categories</h2>
                <ul>
                    <?php getCat(); ?>
                </ul>
            </div>
            <div class="mb-5">
                <h2>Brands</h2>
                <ul>
                    <?php getBrand(); ?>
                </ul>
            </div>
        </div>
    </div>

    <!-- mobile nav -->
    <div class="offcanvas offcanvas-end offcanvas-dark bg-dark sidebar" data-bs-scroll="true" tabindex="-1"
        id="offcanvasprofile" aria-labelledby="offcanvasprofile">
        <div class="container-fluid offcanvas-header">
            <!-- <h5 id="offcanvas">Filter</h5> -->
            <button type="button" class="btn-close btn-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mb-5">
                <h2>My Account</h2>

                <?php 
 if (isset($_SESSION['customer_email'])) {
  $user_email =$_SESSION['customer_email'];
    $get_img = "select * from customers where customer_email='$user_email'";

    $run_img= mysqli_query($db, $get_img);

    $img = mysqli_fetch_array($run_img);

    $user_img = $img['customer_image'];
    $user_name= $img['customer_name'];

    echo"<img src='customer_images/$user_img' width='100' height='100' style='border-radius:100px; margin:10px auto;'/>";
}
 if (!isset($_SESSION['customer_email'])) {
    
      echo"<img src='customer_images/default_user.png' width='100' height='100' style='border-radius:100%; margin:10px auto;'/>";
   }
?>

                <?php 
        if (isset($_SESSION['customer_email'])) {
            echo"<a href='my_account.php?orders'>My Order</a>
            <a href='my_account.php?editacc'>Edit Account</a>
            <a href='my_account.php?changepass'>Change Password</a>
            <a href='my_account.php?deleteacc'>Delete Account</a>
            <a href='logout.php?logout'>Logout</a>";
    }
        ?>

            </div>
        </div>
    </div>


    <!-- Side desktop navigation -->
    <div class="sidenav">
        <h2>My Account</h2>

        <?php 
 if (isset($_SESSION['customer_email'])) {
  $user_email =$_SESSION['customer_email'];
    $get_img = "select * from customers where customer_email='$user_email'";

    $run_img= mysqli_query($db, $get_img);

    $img = mysqli_fetch_array($run_img);

    $user_img = $img['customer_image'];
    $user_name= $img['customer_name'];

    echo"<img src='customer_images/$user_img' width='100' height='100' style='border-radius:100px; margin:10px auto;'/>";

 }
 if (!isset($_SESSION['customer_email'])) {
    
      echo"<img src='customer_images/default_user.png' width='100' height='100' style='border-radius:100%; margin:10px auto;'/>";
   }
?>

        <?php 
        if (isset($_SESSION['customer_email'])) {
            echo"<a href='my_account.php?orders'>My Order</a>
            <a href='my_account.php?editacc'>Edit Account</a>
            <a href='my_account.php?changepass'>Change Password</a>
            <a href='my_account.php?deleteacc'>Delete Account</a>
            <a href='logout.php?logout'>Logout</a>";
    }
        ?>
    </div>


    <div class="box">
        <?php 
       if (!isset($_GET['orders'])) {
        if (!isset($_GET['editacc'])) {
          if (!isset($_GET['changepass'])) {
           if (!isset($_GET['deleteacc'])) {
            if (!isset($_GET['logout'])) {
                if (isset($_SESSION['customer_email'])) {
                    echo"<div class='box_data'>
                    <h2 class='user_info'>Welcome $user_name </h2>
                    <p>You can see you orders progrss by clicking this <a href='my_account.php?orders'>link</a></p>
                    </div>";
                }
                if (!isset($_SESSION['customer_email'])) {
                    echo"<div class='box_data'><h2 class='user_info'>Welcome Guest </h2>
                    <p> Login or Register by clicking <a href='login.php'>login</a> or <a href='register.php'>Register</a></p> </div>";
                }
           } 
          } 
         } 
        } 
       } 

       if (isset($_GET['editacc'])) {
       include('customers/edit_account.php');
    } 

    if (isset($_GET['changepass'])) {
        include('customers/change_pass.php');
     } 

     if (isset($_GET['deleteacc'])) {
        include('customers/delete_account.php');
     } 

     if (isset($_GET['orders'])) {
        echo"<div class='box_data'>
        <h2 class='user_info'>Welcome $user_name </h2>
        <p>No order in progress at this moment!!</p>
        </div>";
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