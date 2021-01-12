<?php  include "INCLUDES/admin_header.php"; ?>
<?php  include "functions.php"; ?>
    
<?php

    if(isset($_SESSION['username']))
    {
        
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
            
<!--
            <p class="form-group">
                <label for="post_tags">Image</label>
                <input type="file" class="form-control" name="user_image">
            </p>
-->

             
             <p class="form-group">        
                <select name="user_role" id="">
<!--                    <option value="Subscriber"><?php echo $user_role; ?></option>-->

<?php

    if($user_role == 'admin')
    {
        echo "<option value='subscriber'>subscriber</option>";
        echo "<option value='collaborator'>collaborator</option>";
    }
    else if($user_role == 'subscriber')
    {
        echo "<option value='admin'>admin</option>";
        echo "<option value='collaborator'>collaborator</option>";
    }
    else
    {
        echo "<option value='subscriber'>subscriber</option>";
        echo "<option value='admin'>admin</option>";
    }

?>
                    
                    
                    
                    
                                      
                </select>          
           </p>
           
            <p class="form-group">
                <label for="author">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
            </p>
            
            <p class="form-group">
                <label for="post_status">Password</label>
                <input type="password" class="form-control" name="user_password" value="<?php echo $user_password; ?>">
            </p>
            
            <p class="form-group">
                <label for="post_tags">Email</label>
                <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
            </p>
            
            <p class="form-group">            
                <input type="submit" class="btn btn-primary" name="update_user" value="Update User">
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