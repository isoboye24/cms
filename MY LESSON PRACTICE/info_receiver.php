<?php 
    
    if(isset($_POST['submit']))
    {
        $name = array("Isaac", "Isoboye", "Tari-ebi");
        
        $maximum = 10;
        $minimum = 5;
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(strlen($username) < $minimum)
        {
            echo "Username must be more than 5". "<br>";
        }
        if(strlen($username) > $maximum)
        {
            echo "Username cannot not be more than 10". "<br>";
        }
        
        echo "Hello ". $username . ", your password is ". $password . "<br>";
        
        if(!in_array($username, $name))
        {
            echo "Incorrect username and password". "<br>";
        }
        else
        {
            echo "Welcome ".$username;
        } 
    }
    
?>
