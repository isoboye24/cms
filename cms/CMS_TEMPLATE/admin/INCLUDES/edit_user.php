
<?php 


//To get the id value from the url
    if(isset($_GET['p_id']))
    {
        $the_user_id = $_GET['p_id'];
    }

        //Take the data from the db where the id = id of the url
        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_users_by_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_users_by_id))
        {
            $user_id = $row['user_id'];
            $user_firstname = $row['user_firstname']; // name of the select option below
            $username = $row['username']; // name of the select option below
            $user_lastname = $row['user_lastname'];
            $user_password = $row['user_password'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];            
        }

    if(isset($_POST['update_user']))
    {
         
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];       
        $user_password = $_POST['user_password'];       
        $user_email = $_POST['user_email'];       
                
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];        
//        
        $user_role = $_POST['user_role'];
        
                
//        Making the image stay when update post is clicked.
//        move_uploaded_file($post_image_temp, "images/$post_image");
        
//        if(empty($post_image))
//        {
//            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
//            $select_image = mysqli_query($connection, $query);
//            
//            while($row = mysqli_fetch_array($select_image))
//            {
//                $post_image = $row['post_image'];
//            }
//            
//        }
//        
        
        //Edit and put the data into the db.
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_password = '{$user_password}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_role = '{$user_role}' ";                 
        $query .= "WHERE user_id = {$the_user_id} ";
        
        $update_user = mysqli_query($connection, $query);

        //ConfirmQuery($update_post); 
        if(!$update_user)
        {
            die("QUERY ERROR ". mysqli_error($connection));
        }
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
            
<!--
            <p class="form-group">
                <label for="post_tags">Image</label>
                <input type="file" class="form-control" name="user_image">
            </p>
-->

             
             <p class="form-group">        
                <select name="user_role" id="">
                    <option value="Subscriber">Select options</option>
                    <option value="Admin">Admin</option>
                    <option value="Subscriber">Subscriber</option>                  
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
    