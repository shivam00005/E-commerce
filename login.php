<?php 
session_start();
include('includes/db.php');
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
    <link rel="stylesheet" href="styles/register_login.css">

    <title>Online Shop</title>
</head>

<body>
    <div class='form_login_box container-fluid col-sm-6'>
        <form class="insert_form mb-5" action="login.php" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <h2 class="col-sm-12 text-center bg-primary text-light pb-1">Login To Your Account</h2>
            </div>

            <div class="row mb-3">
                <label for="inputemail3" class="col-sm-4 col-form-label">Customer Email</label>
                <div class="col-sm-8">
                    <input type="email" name="customer_email" class="form-control" id="inputemail3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputpassword3" class="col-sm-4 col-form-label">Customer Password</label>
                <div class="col-sm-8">
                    <input type="password" name="customer_pass" class="form-control" id="inputpassword3" required>
                </div>
            </div>

            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary mb-2" name="logAcc">Login</button>
            </div>
        </form>
        <a class="login_link" href="register.php">Looking for a new account? Register Here!!</a><br>

        <?php
if(isset($_POST['logAcc'])){
   $c_email = $_POST['customer_email'];
   $c_pass = $_POST['customer_pass'];
 
   $check_login = "select * from customers where customer_email='$c_email'";

   $run_query = mysqli_query($db,$check_login);

   $customer_row = mysqli_num_rows($run_query);

   
   if($customer_row == 1){
       $customer_array = mysqli_fetch_array($run_query);
       $c_hash_pass = $customer_array['customer_password'];
       $pas_verify = password_verify($c_pass, $c_hash_pass);

       if( $pas_verify){
        echo"<script>alert('Logged in!!')</script>";
       echo"<script>window.open('index.php','_self')</script>";
       $_SESSION['customer_email']=$c_email;
       
       }else{
        echo"<script>alert('PLease, enter valid credentials!!')</script>";
      echo"<script>window.open('login.php','_self')</script>";
       }

   }else{
    echo"<script>alert('No account found with this credentials!!')</script>";
    echo"<script>window.open('login.php','_self')</script>";
   }
 

}
?>
    </div>



    <footer>
        <div class="fluid-container bg-light text-center m-0 p-2">
            <p class="pb-1  m-0"> Ⓒ 2022 By Shivam Sharma</p>
        </div>
    </footer>
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