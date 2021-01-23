 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Comment</th>
                                    <th>Email</th>
                                    <th>Comment Status</th>
                                    <th>In response to</th>
                                    <th>Date</th>
                                    <th>Approve</th>                                    
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                                
    global $connection;
    $query = "SELECT * FROM comments";
    $select_comments = mysqli_query($connection, $query);
                                
    if(!$select_comments)
    {
        die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($select_comments))
    {
        $comment_id = Escape($row['comment_id']);
        $comment_post_id = Escape($row['comment_post_id']);
        $comment_author = Escape($row['comment_author']);
        $comment_content = Escape($row['comment_content']);
        $comment_email = Escape($row['comment_email']);
        $comment_status = Escape($row['comment_status']);
        $comment_date = Escape($row['comment_date']);
        
        echo "<tr>";
        echo "<td>{$comment_id}</td>";
        echo "<td>{$comment_author}</td>";
        echo "<td>{$comment_content}</td>";
        echo "<td>{$comment_email}</td>";
        echo "<td>{$comment_status}</td>";
        
        $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
        $select_post_id_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($select_post_id_query))
        {
            $post_id = Escape($row['post_id']);
            $post_title = Escape($row['post_title']);
            
            echo "<td> <a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }
        
        echo "<td>{$comment_date}</td>";        
        echo "<td><a href='comments.php?approve=$comment_id'>approve</a></td>";        
        echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";        
        echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";       
        echo "</tr>";
    }         
                                
 ?>                                  
                                  
                                
                            </tbody>
                        </table>
<?php


    if(isset($_GET['approve']))
    {
        $the_comment_id = Escape($_GET['approve']);

        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";

        $unapprove_comment_query = mysqli_query($connection, $query);
        header("Location: comments.php");
    }


    if(isset($_GET['unapprove']))
    {
        $the_comment_id = Escape($_GET['unapprove']);

        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";

        $unapprove_comment_query = mysqli_query($connection, $query);
        header("Location: comments.php");
    }


    if(isset($_GET['delete']))
    {
        $the_comment_id = Escape($_GET['delete']);

        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";

        $delete_query = mysqli_query($connection, $query);
        header("Location: comments.php");
    }



?>                       
                        