<?php include "db.php"; ?>
<?php session_start(); ?>
<?php include "../admin/functions.php"; ?>

<?php

    if(isset($_POST['login']))
    {
        $username = Escape($_POST['username']);
        $password = Escape($_POST['password']);
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_query = mysqli_query($connection, $query);
        
        ConfirmQuery($select_user_query);
        
         while($row = mysqli_fetch_array($select_user_query))
        {
             $db_user_id = Escape($row['user_id']);
             $db_username = Escape($row['username']);
             $db_user_password = Escape($row['user_password']);
             $db_user_firstname = Escape($row['user_firstname']);
             $db_user_lastname = Escape($row['user_lastname']);
             $db_user_role = Escape($row['user_role']);             
        }
       
        
        if(password_verify($password, $db_user_password))
        {
            // Adding values into session
            if (session_status() === PHP_SESSION_NONE) session_start();
            
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
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
