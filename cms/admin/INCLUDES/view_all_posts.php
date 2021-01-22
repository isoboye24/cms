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
     
                            <thead>
                                <tr>
                                   <th><input type="checkbox" id="selectAllBoxes"></th>  
                                    <th>Id</th>                                    
                                    <th>User</th>
                                    <th>Title</th>                                    
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Comments</th>
                                    <th>Tags</th>                                    
                                    <th>Date</th>
                                    <th>View Post</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Post Views Count</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                                
    global $connection;
    $query = "SELECT * FROM posts ORDER BY post_id DESC";
    $select_posts = mysqli_query($connection, $query);
    
    ConfirmQuery($select_posts);
    
    while($row = mysqli_fetch_assoc($select_posts))
    {
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_user = $row['post_user'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];
        $post_views_count = $row['post_views_count'];

        echo "<tr>"; 
?>
             <td><input type='checkbox' class='checkBoxes' name="checkboxArray[]" value="<?php echo $post_id; ?>"></td>                     
<?php
       
        echo "<td>{$post_id}</td>";
        
        if(!empty($post_author))
        {
            echo "<td>{$post_author}</td>";
        }
        else if(!empty($post_user))
        {
            echo "<td>{$post_user}</td>";
        }
        else
        {
            echo "<td>ANONYMOUS</td>";
        }
        
        echo "<td>{$post_title}</td>";
        

    $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
    $select_categories_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_categories_id))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<td>{$cat_title}</td>";
    }

            echo "<td>{$post_status}</td>";
            echo "<td><img width = '40' src='images/$post_image' </td>";
        
            $query = "SELECT * FROM comments WHERE comment_post_id = $post_id ";
            $send_comment_query = mysqli_query($connection, $query);
            $row = mysqli_fetch_array($send_comment_query);            
            $count_comments = mysqli_num_rows($send_comment_query);

            echo "<td><a href='post_comments.php?id=$post_id'>$count_comments</a></td>";
        
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
            echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";

            echo "</tr>";
    }         
                                
 ?>                                  
                             
                            </tbody>
                        </table>
                    </form>     
                        
<?php

    if(isset($_GET['delete']))
    {
        $the_post_id = $_GET['delete'];

        $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";

        $delete_query = mysqli_query($connection, $query);
        header("Location: posts.php");

    }

    if(isset($_GET['reset']))
    {
        $the_post_id = $_GET['reset'];

        $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$the_post_id}";

    //    To add escape
    //    $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" .mysqli_real_escape_string($the_post_id)";

        $reset_query = mysqli_query($connection, $query);
        header("Location: posts.php");

    }

?>                       
                        