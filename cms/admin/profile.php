<?php  include "INCLUDES/admin_header.php"; ?>
<?php  include "functions.php"; ?>
    
<?php

    if(isset($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        
        $select_user_profile_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_array($select_user_profile_query))
        {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];        
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }



?>   
 
<?php

if(isset($_POST['update_user']))
    {
         
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];       
        $user_password = $_POST['user_password'];       
        $user_email = $_POST['user_email'];       
                
        
        //Edit and put the data into the db.
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_password = '{$user_password}', ";
        $query .= "user_email = '{$user_email}', ";             
        $query .= "WHERE username = '{$username}' ";
        
        $edit_user_query = mysqli_query($connection, $query);

        ConfirmQuery($edit_user_query);         
    }

?>    

    <div id="wrapper">

        <!-- Navigation -->
        <?php  include "INCLUDES/admin_navigation.php"; ?>
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                       
   <form action="" method="post" enctype="multipart/form-data">
   <!--Enctype is in charge of sending form data.-->
           
       <div class="col-xs-6">          
           
            <p class="form-group">
                <label for="post_image">Firstname</label>
                <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname; ?>">
            </p>

            <p class="form-group">
                <label for="post_tags">Lastname</label>
                <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname; ?>">
            </p>
            
            <p class="form-group">
                <label for="author">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
            </p>
            
            <p class="form-group">
                <label for="post_status">Password</label>
                <input type="password" class="form-control" name="user_password" autocomplete="off">
            </p>
            
            <p class="form-group">
                <label for="post_tags">Email</label>
                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
            </p>
            
            <p class="form-group">            
                <input type="submit" class="btn btn-primary" name="update_user" value="Update Profile">
            </p>                        
        
       </div>     
    </form>
    
                      
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
<?php  include "INCLUDES/admin_footer.php"; ?>