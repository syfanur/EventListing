<?php


    include("includes/header.php");

?>

   <div id="content"><!-- #content Begin -->
       <div class="container"><!-- container Begin -->

        <div class="row"><!-- row begin -->
          
          <div class="col-xs-12"><!-- col-xs-12 Begin -->
                 
                 <div class="box-details"><!-- box Begin -->

                   <div class="box"><!-- box-header Begin -->

                       <center><!-- center Begin -->

                           <h2> Login to your account </h2>

                       </center><!-- center Finish -->

                       <hr>

        <form method="post" action="checkout.php"><!-- form Begin -->

        <div class="form-group"><!-- form-group Begin -->

            <label> Email </label>

            <input name="c_email" type="text" class="form-control" required>

        </div><!-- form-group Finish -->

        <div class="form-group"><!-- form-group Begin -->

            <label> Password </label>

            <input name="c_pass" type="password" class="form-control" required>

        </div><!-- form-group Finish -->

        <div class="text-center"><!-- text-center Begin -->

            <button name="login" value="Login" class="btn btn-primary">

                <i class="fa fa-sign-in"></i> Login

            </button>

        </div><!-- text-center Begin -->

        </form><!-- form Finish -->

</div><!-- box-header Finish -->

</div><!-- box Finish -->

<center><!-- text-center Begin -->

        <a href="customer_register.php">

          <h3> Don't have an account..? Register here </h3>

        </a>

    </center><!-- text-center Finish -->

</div><!-- col-xs-12 Finish -->

</div><!-- row finish -->


</div><!-- container Finish -->
</div><!-- #content Finish -->

<?php

include("includes/footer.php");

?>

    

    </div><!-- box-header Finish-->   

</div><!-- box Finish-->

</div><!-- col-xs-12 Finish -->

<?php

if(isset($_POST['login'])) {

    $customer_email = $_POST['c_email'];

    $customer_pass = $_POST['c_pass'];

    $select_customer = "SELECT * FROM customer WHERE customer_email='$customer_email' AND customer_pass='$customer_pass'";

    $run_customer = mysqli_query($con,$select_customer);

    $get_ip = getRealIpUser();

    $check_customer = mysqli_num_rows($run_customer);

    $select_cart = "SELECT * FROM cart WHERE ip_add='$get_ip'";

    $run_cart = mysqli_query($con,$select_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if($check_customer==0){

        echo "<script>alert('Your email or password is wrong')</script>";

        exit();

    }

    if($check_customer==1 AND $check_cart==0){

        $_SESSION['customer_email']=$customer_email;

       echo "<script>alert('You are Logged in')</script>";

       echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";

    }else{

        $_SESSION['customer_email']=$customer_email;

       echo "<script>alert('You are Logged in')</script>";

       echo "<script>window.open('checkout.php','_self')</script>";

    }

}

?>
