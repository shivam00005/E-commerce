<?php if (isset($_SESSION['customer_email'])) {
$user_email =$_SESSION['customer_email'];
$get_country = "select * from customers where customer_email='$user_email'";

$run_country= mysqli_query($db, $get_country);

$country = mysqli_fetch_array($run_country);

$customer_id = $country['customer_id'];
$customer_name = $country['customer_name'];
$customer_email = $country['customer_email'];
$customer_image = $country['customer_image'];
$customer_country = $country['customer_country'];
$customer_city = $country['customer_city'];
$customer_address = $country['customer_address'];
$customer_contact = $country['customer_contact'];


} 
?>

<div class='form_box container-fluid col-sm-6 my-5'>
    <form class="insert_form mb-5" action="" method="POST" enctype="multipart/form-data">
        <div class="row mb-3">
            <h2 class="col-sm-12 text-center bg-dark text-light pb-1">Create Your New Account</h2>
        </div>
        <div class="row mb-3">
            <label for="inputname3" class="col-sm-4 col-form-label">Customer Name</label>
            <div class="col-sm-8">
                <input type="text" name="customer_name" class="form-control" id="inputname3"
                    value="<?php echo $customer_name ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputemail3" class="col-sm-4 col-form-label">Customer Email</label>
            <div class="col-sm-8">
                <input type="Email" name="customer_email" class="form-control" id="inputemail3"
                    value="<?php echo $customer_email ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputimage3" class="col-sm-4 col-form-label">Customer Image</label>
            <div class="col-sm-8">
                <input type="file" name="customer_img" class="form-control" id="inputimage3 "
                    value="<?php echo$user_img ?>">
                <img src='customer_images/<?php echo$user_img ?>' height='100'
                    style='border-radius:100px; margin:10px auto;  width:100px;' />
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputcountry3" class="col-sm-4 col-form-label">Customer country</label>
            <div class="col-sm-8">
                <select class="form-select" name="customer_country" id="inputcountry3" disabled>
                    <option><?php echo $customer_country ?></option>

                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputcity3" class="col-sm-4 col-form-label">Customer City</label>
            <div class="col-sm-8">
                <input type="text" name="customer_city" class="form-control" id="inputcity3"
                    value="<?php echo $customer_city ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputadrs3" class="col-sm-4 col-form-label">Customer Address</label>
            <div class="col-sm-8">
                <input type="text" name="customer_adres" class="form-control" id="inputadrs3"
                    value="<?php echo $customer_address ?>" required>
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputcontact3" class="col-sm-4 col-form-label">Customer Contact</label>
            <div class="col-sm-8">
                <input type="text" name="customer_contact" class="form-control" id="inputcontact3"
                    value="<?php echo $customer_contact ?>" required>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-outline-dark mb-2" name="updateAcc">Update Account</button>
        </div>
    </form>
</div>


<?php 

if(isset($_POST['updateAcc'])){
  $c_name = $_POST['customer_name'];
  $c_email = $_POST['customer_email'];
  $c_image = $_FILES['customer_img']['name'];
  $img_tmp_name = $_FILES['customer_img']['tmp_name'];
  $c_city = $_POST['customer_city'];
  $c_address = $_POST['customer_adres'];
  $c_contact = $_POST['customer_contact'];
  $ip= getip();

    
  if($c_image == Null){
    $update_customer= "UPDATE `customers` SET `customer_ip`='$ip',`customer_name`='$c_name',`customer_email`='$c_email',`customer_city`='$c_city',`customer_contact`='$c_contact',`customer_address`='$c_address' WHERE `customer_id`='$customer_id'";

  }else{
    $update_customer= "UPDATE `customers` SET `customer_ip`='$ip',`customer_name`='$c_name',`customer_email`='$c_email',`customer_image`='$c_image',`customer_city`='$c_city',`customer_contact`='$c_contact',`customer_address`='$c_address' WHERE `customer_id`='$customer_id'";

  }
  

     $run_customer= mysqli_query($db, $update_customer);

     if($run_customer){
        move_uploaded_file($img_tmp_name,"customer_images/$c_image");
        echo"<script>alert('Account Updated')</script>";
        echo"<script>window.open('my_account.php','_self')</script>";
     }
    
   

  }
?>