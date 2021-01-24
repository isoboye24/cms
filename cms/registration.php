<?php  include "INCLUDES/db.php"; ?>
 <?php  include "INCLUDES/header.php"; ?>
 <?php  include "admin/functions.php"; ?>

<?php

    if(isset($_POST['submit']))
    {
        $username = $_POST[Escape('username')];
        $email = $_POST[Escape('email')];
        $password = $_POST[Escape('password')];
        
         if(!empty($username) && !empty($email) && !empty($password))
         {
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

            $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
            $query .= "VALUE('{$username}', '{$email}', '{$password}', 'Subscriber') ";

            $register_user_query = mysqli_query($connection, $query);
            ConfirmQuery($register_user_query);
             
            $message = "Your registration has been submitted";
         }
         else
         {
            $message = "Fields cannot be empty";
         }
        
    }
    else // Incase of we don't click the submit button and the page is refreshed PHP is going to look for what to echo and that will give an error hence, this lines of code.
    {
        $message = "";
    }

?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                       <h4 class="text-center"><?php echo $message; ?></h4>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
