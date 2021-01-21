 <?php  include "INCLUDES/admin_header.php"; ?>
<?php  include "functions.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php  include "INCLUDES/admin_navigation.php"; ?>
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to comments
                            <small>Author</small>
                        </h1>
                        
 <?php                       
    if(isset($_POST['checkboxArray']))
    {
        foreach($_POST['checkboxArray'] as $post_value_id)
        {
            $bulk_options = $_POST['bulk_options'];
            
            switch($bulk_options)
            {
                case 'Published':
                    
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_value_id} ";
                    $update_to_published_status = mysqli_query($connection, $query);
                    
                    confirmQuery($update_to_published_status);
                    
                    break;
                
                case 'Draft':
                    
                    $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$post_value_id} ";
                    $update_to_draft_status = mysqli_query($connection, $query);
                    
                    ConfirmQuery($update_to_draft_status);
                    
                    break;
                    
                    case 'Delete':
                    
                    $query = "DELETE FROM posts WHERE post_id = {$post_value_id} ";
                    $update_to_delete_status = mysqli_query($connection, $query);
                    
                    confirmQuery($update_to_delete_status);
                    
                    break;
                    
                case 'Clone':
                    $query = "SELECT * FROM posts WHERE post_id = {$post_value_id}";
                    $select_post_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_array($select_post_query))
                    {
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
//                        $post_date = $row['post_date'];
                        $post_author = $row['post_author'];
                        $post_status = 'Cloned';
                        $post_image = $row['post_image'];
                        $post_tags = $row['post_tags'];
                        $post_comment_count = 0;
                        $post_content = $row['post_content'];
                        $post_views_count = $row['post_views_count'];
                    }
                    
                    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status, post_views_count) ";
                    $query .= "VALUE({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', {$post_comment_count}, '{$post_status}', {$post_views_count} ) ";
                    
                    $copy_query = mysqli_query($connection, $query);
                    
                    confirmQuery($copy_query);
                    
                    break;
       
            }
        }
    }
?>
 
                      <form action="" method="post">
                           
                        <table class="table table-bordered table-hover">
                           
                           <div id="bulkOptionContainer" class="col-xs-4">
                               
                            <!-- The value of the option is carried away to PHP calculation by the name attribute of the select.-->
                                  <select class="form-control" name="bulk_options" id="">
                                   
                                      <option value="">Select Options</option>
                                      <option value="Published">Published</option>
                                      <option value="Draft">Draft</option>
                                      <option value="Delete">Delete</option>
                                      <option value="Clone">Clone</option>
                                      
                               </select>                               
                               
                           </div>
                           
                           <div class="col-xs-4">                               
                               <input type="submit" name="submit" class="btn btn-success" value="Apply">
                               <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
                           </div>
  
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
    $query = "SELECT * FROM comments WHERE comment_post_id = ".mysqli_real_escape_string($connection, $_GET['id'])." ";
    $select_comments = mysqli_query($connection, $query);
                                
    if(!$select_comments)
    {
        die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($select_comments))
    {
        $comment_id = $row['comment_id'];
        $comment_post_id = $row['comment_post_id'];
        $comment_author = $row['comment_author'];
        $comment_content = $row['comment_content'];
        $comment_email = $row['comment_email'];        
        $comment_status = $row['comment_status'];
        $comment_date = $row['comment_date'];
        

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
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            
            echo "<td> <a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        }
        
        
        echo "<td>{$comment_date}</td>";        
        echo "<td><a href='comments.php?approve=$comment_id'>approve</a></td>";        
        echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";        
        echo "<td><a href='post_comments.php?delete=$comment_id&id=".$_GET['id']."'>Delete</a></td>";       
        echo "</tr>";
    }         
                                
 ?>                                  
                                  
                                
                            </tbody>
                        </table>
<?php


if(isset($_GET['approve']))
{
    $the_comment_id = $_GET['approve'];
    
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id ";
    
    $unapprove_comment_query = mysqli_query($connection, $query);
    header("Location: post_comments.php");
}


if(isset($_GET['unapprove']))
{
    $the_comment_id = $_GET['unapprove'];
    
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
    
    $unapprove_comment_query = mysqli_query($connection, $query);
    header("Location: post_comments.php");
}


if(isset($_GET['delete']))
{
    $the_comment_id = $_GET['delete'];
    
    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id} ";
    
    $delete_query = mysqli_query($connection, $query);
    header("Location: post_comments.php?id=".$_GET['id']."");
}

?>  
     
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
    <?php  include "INCLUDES/admin_footer.php"; ?>

                     
                        