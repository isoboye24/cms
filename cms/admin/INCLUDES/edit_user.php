
<?php 


//To get the id value from the url
    if(isset($_GET['p_id']))
    {
        $the_user_id = $_GET['p_id'];
    

        //Take the data from the db where the id = id of the url
        $query = "SELECT * FROM users WHERE user_id = {$the_user_id} ";
        $select_users_by_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_users_by_id))
        {
            $user_id = $row['user_id'];
            $user_firstname = $row['user_firstname']; // name of the select option below
            $username = $row['username']; // name of the select option below
            $user_lastname = $row['user_lastname'];
            $db_user_password = $row['user_password'];
            $user_email = $row['user_email'];                      
       
        }  
            if(isset($_POST['edit_user']))
            {

                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $username = $_POST['username'];       
                $user_password = $_POST['user_password'];       
                $user_email = $_POST['user_email'];       

                 if(!empty($user_password))
                 {
                     $password_query = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
                     $edit_user_query = mysqli_query($connection, $password_query);
                     ConfirmQuery($edit_user_query);

                     $row = mysqli_fetch_array($edit_user_query);

                     $db_user_password = $row['user_password'];


                    if($db_user_password != $user_password)
                    {
                         $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
                    }

                    //Edit and put the data into the db.
                    $query = "UPDATE users SET ";
                    $query .= "user_firstname = '{$user_firstname}', ";
                    $query .= "user_lastname = '{$user_lastname}', ";
                    $query .= "username = '{$username}', ";
                    //$query .= "user_password = '{$hashed_password}', ";
                    $query .= "user_email = '{$user_email}', ";                                
                    $query .= "WHERE user_id = {$the_user_id} ";

                    $update_user = mysqli_query($connection, $query);

                    ConfirmQuery($update_user);

                }
                echo "User Updated ". "<a href='users.php'>View Users?</a>";
            }
        
    }
    else
    {
        header("Location: index.php");
    }


?>
    
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
                <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
            </p>                        
        
       </div>     
    </form>
    