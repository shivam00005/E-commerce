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
    <link rel="stylesheet" href="styles/register_login.css">

    <title>Online Shop</title>
</head>

<body>
    <div class='form_box container-fluid col-sm-6'>
        <form class="insert_form mb-5" action="register.php" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <h2 class="col-sm-12 text-center bg-primary text-light pb-1">Create Your New Account</h2>
            </div>
            <div class="row mb-3">
                <label for="inputname3" class="col-sm-4 col-form-label">Customer Name</label>
                <div class="col-sm-8">
                    <input type="text" name="customer_name" class="form-control" id="inputname3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputemail3" class="col-sm-4 col-form-label">Customer Email</label>
                <div class="col-sm-8">
                    <input type="Email" name="customer_email" class="form-control" id="inputemail3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputpassword3" class="col-sm-4 col-form-label">Customer Password</label>
                <div class="col-sm-8">
                    <input type="password" name="customer_pass" class="form-control" id="inputpassword3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputimage3" class="col-sm-4 col-form-label">Customer Image</label>
                <div class="col-sm-8">
                    <input type="file" name="customer_img" class="form-control" id="inputimage3">
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputcountry3" class="col-sm-4 col-form-label">Customer country</label>
                <div class="col-sm-8">
                    <select class="form-select" name="customer_country" id="inputcountry3" required>
                        <option>Choose Country</option>
                        <option value="usa">USA</option>
                        <option value="inda">India</option>
                        <option value="germany">Germany</option>
                        <option value="canada">Canada</option>
                        <option value="australia">Australia</option>
                        <option value="bangladesh">Bangladesh</option>
                        <option value="africa">Africa</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="srilanka">Sri Lanka</option>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputcity3" class="col-sm-4 col-form-label">Customer City</label>
                <div class="col-sm-8">
                    <input type="text" name="customer_city" class="form-control" id="inputcity3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputadrs3" class="col-sm-4 col-form-label">Customer Address</label>
                <div class="col-sm-8">
                    <input type="text" name="customer_adres" class="form-control" id="inputadrs3" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputcontact3" class="col-sm-4 col-form-label">Customer Contact</label>
                <div class="col-sm-8">
                    <input type="text" name="customer_contact" class="form-control" id="inputcontact3" required>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-primary mb-2" name="createAcc">Create Account</button>
            </div>
        </form>
        <a class="login_link" href="login.php">Aleady have a account? Login Here!!</a>
    </div>
    <?php 
if(isset($_POST['createAcc'])){
  $c_name = $_POST['customer_name'];
  $c_email = $_POST['customer_email'];
  $c_pass = $_POST['customer_pass'];
  $c_image = $_FILES['customer_img']['name'];
  $img_tmp_name = $_FILES['customer_img']['tmp_name'];
  $c_country = $_POST['customer_country'];
  $c_city = $_POST['customer_city'];
  $c_address = $_POST['customer_adres'];
  $c_contact = $_POST['customer_contact'];
  $ip= getip();

  $select_user = "select * from customers where customer_email='$c_email'";
  $run_query= mysqli_query($db,$select_user);

  $customer_rows= mysqli_num_rows($run_query);

  if($customer_rows == 0){

      $hash_pass = password_hash($c_pass,PASSWORD_DEFAULT);
    if($c_image== Null){
    $c_image='default_user.png';
    $img_tmp_name = $_FILES['customer_img']['tmp_name'];
    $insert_customer= "INSERT INTO `customers`(`customer_ip`,`customer_name`, `customer_email`, `customer_password`, `customer_image`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`)VALUES ('$ip','$c_name','$c_email','$hash_pass','$c_image','$c_country','$c_city','$c_address','$c_contact')";
}else{
    $insert_customer= "INSERT INTO `customers`(`customer_ip`,`customer_name`, `customer_email`, `customer_password`, `customer_image`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`)VALUES ('$ip','$c_name','$c_email','$hash_pass','$c_image','$c_country','$c_city','$c_address','$c_contact')";
}
     $run_customer= mysqli_query($db, $insert_customer);

     if($run_customer){
         $_SESSION['customer_email']= $c_email;
        move_uploaded_file($img_tmp_name,"customer_images/$c_image");
        echo"<script>alert('Account Registered!!')</script>";
        echo"<script>window.open('index.php','_self')</script>";
     }
    
   }else{
    echo"<script>alert('Account already exist with thas email account!!')</script>";
    echo"<script>window.open('register.php','_self')</script>";
  }

  }

?>



    <footer>
        <div class="fluid-container bg-light text-center m-0 p-2">
            <p class="pb-1  m-0"> Ⓒ 2022 By Shivam Sharma</p>
        </div>
    </footer>
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