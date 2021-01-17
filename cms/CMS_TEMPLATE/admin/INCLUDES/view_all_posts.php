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
                    
                    confirmQuery($update_to_draft_status);
                    
                    break;
                    
                    case 'Delete':
                    
                    $query = "DELETE FROM posts WHERE post_id = {$post_value_id} ";
                    $update_to_delete_status = mysqli_query($connection, $query);
                    
                    confirmQuery($update_to_delete_status);
                    
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
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Comments</th>
                                    <th>Tags</th>                                    
                                    <th>Date</th>
                                    <th>View Post</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
<?php
                                
    global $connection;
    $query = "SELECT * FROM posts";
    $select_posts = mysqli_query($connection, $query);
                                
    if(!$select_posts)
    {
        die("QUERY FAILED". mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($select_posts))
    {
        $post_id = $row['post_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];

        echo "<tr>"; 
?>
             <td><input type='checkbox' class='checkBoxes' name="checkboxArray[]" value="<?php echo $post_id; ?>"></td>       
               
                             
<?php

              
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_author}</td>";
        

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
        echo "<td>{$post_comment_count}</td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
                
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



?>                       
                        