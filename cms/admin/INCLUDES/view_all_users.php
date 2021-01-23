 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>                                    
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>            
                                </tr>
                            </thead>
                            <tbody>
<?php
                                
    global $connection;
    $query = "SELECT * FROM users";
    $select_users = mysqli_query($connection, $query);
                                
    if(!$select_users)
    {
        die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($select_users))
    {
        $user_id = Escape($row['user_id']);
        $username = Escape($row['username']);
        $user_firstname = Escape($row['user_firstname']);
        $user_lastname = Escape($row['user_lastname']);
        $user_email = Escape($row['user_email']);
        $user_image = Escape($row['user_image']);
        $user_role = Escape($row['user_role']);
        
        echo "<tr>";
        echo "<td>{$user_id}</td>";
        echo "<td>{$username}</td>";        
        echo "<td>{$user_firstname}</td>";
        echo "<td>{$user_lastname}</td>";
        echo "<td>{$user_email}</td>";
        echo "<td>{$user_role}</td>";
        
              
        echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";        
        echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";        
        echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a></td>";        
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='users.php?delete={$user_id}'>Delete</a></td>";       
        echo "</tr>";
    }         
                                
 ?>
                                
                            </tbody>
                        </table>
<?php

    if(isset($_GET['change_to_admin']))
    {
        $the_user_id = Escape($_GET['change_to_admin']);

        $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = $the_user_id ";

        $change_to_admin_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }


    if(isset($_GET['change_to_sub']))
    {
        $the_user_id = Escape($_GET['change_to_sub']);

        $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = $the_user_id ";

        $change_to_subscriber_query = mysqli_query($connection, $query);
        header("Location: users.php");
    }


    if(isset($_GET['delete']))
    {
        if(isset($_SESSION['user_role']))
        {
            if($_SESSION['user_role'] == 'Admin')
            {
                $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);

                $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";

                $delete_query = mysqli_query($connection, $query);
                header("Location: users.php");
            }        
        }


    }

?>                       
                        