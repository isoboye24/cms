<?php 

    if(isset($_POST['create_user']))
    {
        $user_firstname = Escape($_POST['user_firstname']);
        $user_lastname = Escape($_POST['user_lastname']);
        $user_role = Escape($_POST['user_role']);
        
        $username = Escape($_POST['username']);
        $user_password = Escape($_POST['user_password']);
        $user_email = Escape($_POST['user_email']);
        
        $password = password_hash('$user_password', PASSWORD_BCRYPT, array('cost' => 12));
        
        $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) ";
        $query .= "VALUE('{$username}', '{$password}', '{$user_firstname}', '{$user_lastname}', '{$user_email}', '{$user_role}') ";
        
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
    