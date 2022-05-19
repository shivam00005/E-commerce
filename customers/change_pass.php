<div class='form_box container-fluid col-sm-6 my-5'>
    <form class="insert_form mb-5" action="" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <h2 class="col-sm-12 text-center bg-dark text-light pb-1">Change Your Password</h2>
        </div>
        <div class="row mb-3">
            <label for="inputpassword3" class="col-sm-4 col-form-label">Customer Password</label>
            <div class="col-sm-8">
                <input type="password" name="customer_pass" class="form-control" id="inputpassword3" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputpassword2" class="col-sm-4 col-form-label">New Password</label>
            <div class="col-sm-8">
                <input type="password" name="customer_new_pass" class="form-control" id="inputpassword2" required>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <button type="submit" class="btn btn-outline-dark mb-2" name="pass">Change Password</button>
        </div>
    </form>
    <!-- </div> -->

    <?php  

if (isset($_POST['pass'])) {
  $c_email=$_SESSION['customer_email'];
  $old_pass =$_POST['customer_pass'];
  $new_pass = $_POST['customer_new_pass'];
  $select_user = "select * from customers where customer_email='$c_email'";
  $run_query= mysqli_query($db,$select_user);
  $get_pass = mysqli_fetch_array($run_query);

  $pass = $get_pass['customer_password'];
  $pas_verify = password_verify($old_pass, $pass);

  if( $pas_verify){
    $hash_pass = password_hash($new_pass,PASSWORD_DEFAULT);
  $update_customer= "UPDATE `customers` SET `customer_password`='$hash_pass' WHERE `customer_email`='$c_email'";

  $run_customer= mysqli_query($db, $update_customer);

  if($run_customer){

    echo"<script>alert('Password Changed')</script>";
  echo"<script>window.open('index.php','_self')</script>";
  
   
   }

   
 }else{
    echo"<script>alert('Please, Enter Correct Password')</script>";
    echo"<script>window.open('my_account.php?changepass','_self')</script>";
 }
}
?>