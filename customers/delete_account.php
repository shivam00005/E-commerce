<div class='form_box container-fluid col-sm-6 my-5'>
    <form class="insert_form mb-5" action="" method="post" enctype="multipart/form-data">
        <div class="row mb-3">
            <h2 class="col-sm-12 text-center bg-dark text-light pb-1">Delete Your Account</h2>
        </div>
        <div class="row mb-3">
            <label for="inputpassword3" class="col-sm-12 col-form-label">Are you sure? yo want to delete your
                account?</label>
        </div>
        <div class="col-sm-12 text-center">
            <a href='my_account.php' class="btn btn-outline-success mx-4" name="cencel"> Cencel</a>
            <button type="submit" class="btn btn-outline-dark my-2" name="delete">Delete Account</button>
        </div>
    </form>
</div>

<?php 

if (isset($_POST['delete'])) {
    $c_email=$_SESSION['customer_email'];
    $delete_user = "DELETE FROM `customers` WHERE customer_email='$c_email'";
    $run_query= mysqli_query($db,$delete_user);
    if($run_query){
    $delete_cart = "DELETE FROM `cart` WHERE c_email='$c_email'";
     $run_delete= mysqli_query($db,$delete_cart);
     if ($run_delete) {
        echo"<script>alert('Account Deleted')</script>";
        session_destroy();
        echo"<script>window.open('index.php','_self')</script>";
      }
     
     }
   
   }
  ?>