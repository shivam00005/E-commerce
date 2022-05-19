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
                    <a class="nav-link" href="cart.php">Cart <span class=" translate-end badge rounded-pill bg-primary">
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
    </div>

</nav>

<div class="offcanvas offcanvas-end offcanvas-dark bg-dark sidebar" data-bs-scroll="true" tabindex="-1" id="offcanvas"
    aria-labelledby="offcanvas">
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