<?php
    include "db_connector.php";
    
    function CreateData()
    {
        global $connection;

        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            //So, that the user can also input strings with apostrophe.
            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            
            //To encrypt the password.
            $hashFormat = "$2y$10$";
            $salt = "iusesomecrazystrings22";
            $hashF_and_salt = $hashFormat . $salt;
            
            $password = crypt($password, $hashF_and_salt);
            

            $query = "INSERT INTO users(username, password)";
            
            $query .= "VALUES('$username', '$password')";

            $result = mysqli_query($connection, $query);

            if(!$result)
            {
                die('Query failed'.mysqli_error());
            }
            else
            {
                echo "Record created";
            }
        }
    }


    function ReadData()
    {
        global $connection;
        $query = "SELECT * FROM users";
        $result = mysqli_query($connection, $query);

        if(!$result)
        {
            die('Query failed'.mysqli_error());
        }
        else
        {
            echo "Record read";
        }
        
        while($row = mysqli_fetch_assoc($result))
        {
            print_r($row);
        }            
     }


    function ShowAlldata()
    {
        global $connection;
        
         $query = "SELECT * FROM users";
        //The dot sign allows VALUES to concatenate with the above line.    
        $result = mysqli_query($connection, $query);

        if(!$result)
        {
            die('Query failed'.mysqli_error());
        }

         while($row = mysqli_fetch_assoc($result))
        {
            $id = $row['id'];
            echo "<option value='$id'>$id</option>";
        }
    }


    function UpdateTable()
    {
        global $connection;
       
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $id = $_POST['id'];

            $query = "UPDATE users SET ";
            $query .= "username = '$username', ";
            $query .= "password = '$password' ";
            $query .= "WHERE id = $id";

            $result = mysqli_query($connection, $query);

            if(!$result)
            {
                die("Query failed. ". mysqli_error($connection));
            }
            else
            {
                echo "Record updated";
            }
        }
    }


    function DeleteRows()
    {
        global $connection;
        
        if(isset($_POST['submit']))
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $id = $_POST['id'];

            $query = "DELETE FROM users ";        
            $query .= "WHERE id = $id";

            $result = mysqli_query($connection, $query);

            if(!$result)
            {
                die("Query failed. ". mysqli_error($connection));
            }
            else
            {
                echo "Record deleted";
            }
        }
    }
   
?>
