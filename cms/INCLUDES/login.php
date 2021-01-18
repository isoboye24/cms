<?php include "db.php"; ?>
<?php session_start(); ?>
<?php include "../admin/functions.php"; ?>

<?php

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_query = mysqli_query($connection, $query);
        
        ConfirmQuery($select_user_query);
        
         while($row = mysqli_fetch_array($select_user_query))
        {
             $db_user_id = $row['user_id'];
             $db_username = $row['username'];
             $db_user_password = $row['user_password'];
             $db_user_firstname = $row['user_firstname'];
             $db_user_lastname = $row['user_lastname'];
             $db_user_role = $row['user_role'];
        }
        
        // Fetch randSalt
        $query = "SELECT randSalt FROM users"; 
        $select_randsalt_query = mysqli_query($connection, $query);

        ConfirmQuery($select_randsalt_query);
        
        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['randSalt'];
        $password = crypt($password, $salt);
        
        
        if($username === $db_username && $password === $db_user_password)
        {
            // Adding values into session
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $password;
            $_SESSION['lastname'] = $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
            
            header("Location: ../admin");
        }        
        else
        {
            header("Location: ../index.php");
        }
        
    }

   


?>
