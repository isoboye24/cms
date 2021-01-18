
<?php 




    if(isset($_POST['create_user']))
    {
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];       
        $user_role = $_POST['user_role'];       
                
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        
//        $post_date = date('d-m-y');
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];
        
        
//        move_uploaded_file($post_image_temp, "images/$post_image");
        
        
        // Steps to display shorter password when it is showing long hashed password. But, from PHP 8.0.0 this is no longer needed because PHP has already done with that.
            $query = "SELECT randSalt FROM users";
            $select_randSalt_query = mysqli_query($connection, $query);
            ConfirmQuery($select_randSalt_query);
            $row = mysqli_fetch_array($select_randSalt_query);        
            $salt = $row['randSalt'];        
            // password encryption to prevent hackers
            $hashed_password = crypt($user_password, $salt);
        
        
        $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) ";
        $query .= "VALUE('{$username}', '{$hashed_password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}') ";
        
        $create_post_user = mysqli_query($connection, $query);
        
        ConfirmQuery($create_post_user);
        
        echo "User Created". " ". "<a href='users.php'>View Users</a>";
    }

?>
   

   <form action="" method="post" enctype="multipart/form-data">
   <!--Enctype is in charge of sending form data.-->
           
       <div class="col-xs-6">          
           
            <p class="form-group">
                <label for="post_image">Firstname</label>
                <input type="text" class="form-control" name="user_firstname">
            </p>

            <p class="form-group">
                <label for="post_tags">Lastname</label>
                <input type="text" class="form-control" name="user_lastname">
            </p>
            
<!--
            <p class="form-group">
                <label for="post_tags">Image</label>
                <input type="file" class="form-control" name="user_image">
            </p>
-->

             
             <p class="form-group">        
                <select name="user_role" id="" class="form-control">
                    <option value="Subscriber">Select options</option>
                    <option value="Admin">Admin</option>
                    <option value="Subscriber">Subscriber</option>                  
                </select>          
           </p>
           
            <p class="form-group">
                <label for="author">Username</label>
                <input type="text" class="form-control" name="username">
            </p>
            
            <p class="form-group">
                <label for="post_status">Password</label>
                <input type="password" class="form-control" name="user_password">
            </p>
            
            <p class="form-group">
                <label for="post_tags">Email</label>
                <input type="email" class="form-control" name="user_email">
            </p>
            
            <p class="form-group">            
                <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
            </p>                        
        
       </div>     
    </form>
    