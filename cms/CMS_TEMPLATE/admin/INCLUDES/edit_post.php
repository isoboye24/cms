<?php 
    
    //To get the id value from the url
    if(isset($_GET['p_id']))
    {
        $the_post_id = $_GET['p_id'];
    }

        //Take the data from the db where the id = id of the url
        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
        $select_posts_by_id = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_posts_by_id))
        {
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id']; // name of the select option below
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];        

        }

    if(isset($_POST['update_post']))
    {
         // Pick from the input box to the exact variables holding data from the db in the above. Thereby changing them. This section is basically for the post_category and image settings.
        $post_category_id = $_POST['post_category'];
        $post_title = $_POST['post_title'];
        $post_author = $_POST['post_author'];       
        $post_status = $_POST['post_status'];       
                
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];        
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        
                
//        Making the image stay when update post is clicked.
        move_uploaded_file($post_image_temp, "images/$post_image");
        
        if(empty($post_image))
        {
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $select_image = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_array($select_image))
            {
                $post_image = $row['post_image'];
            }
            
        }
        
        
        //Edit and put the data into the db.
        $query = "UPDATE posts SET ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_author = '{$post_author}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_image = '{$post_image}', ";
        $query .= "post_date = now(), ";
        $query .= "post_content = '{$post_content}' ";             
        $query .= "WHERE post_id = {$the_post_id} ";
        
        $update_post = mysqli_query($connection, $query);

        //ConfirmQuery($update_post); 
        if(!$update_post)
        {
            die("QUERY ERROR ". mysqli_error($connection));
        }
    }

?>
    
    

   <form action="" method="post" enctype="multipart/form-data">
   <!--Enctype is in charge of sending form data.-->
           
       <div class="col-xs-6">
           
           <p class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
           </p>          

            <p class="form-group">
<!--               To show the options of the category from the category table incase it also need to be changed-->
            <select name="post_category" id="">
                
                
<?php         
    
    $query = "SELECT * FROM categories ";
    $select_categories = mysqli_query($connection, $query);
                       
    ConfirmQuery($select_categories);                   
                       
    while($row = mysqli_fetch_assoc($select_categories))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        
        echo "<option value='$cat_id'>{$cat_title}</option>";
        
    }

        
?>
             
             
              </select>
          
           </p>

            <p class="form-group">
                <label for="author">Post Author</label>
                <input type="text" class="form-control" name="post_author" value="<?php echo $post_author; ?>">
            </p>
            
            <div class="form-group">
                <select name='post_status' id=''>
                    <option value=''><?php echo $post_status; ?></option>
                    
<?php

     if($post_status == 'Published')
     {
         echo "<option value='Draft'>Draft</option>";
     }
     else
     {
         echo "<option value='Published'>Publish</option>";
     }



?>
                    
                    
                    
                </select>
            </div>
            
            
            

<!--
            <p class="form-group">
                <label for="post_status">Post Status</label>
                <input type="text" class="form-control" name="post_status" value="<?php echo $post_status; ?>">
            </p>
-->

            <p class="form-group">
                <label for="post_image">Post Image</label><br>
                <img width="100" src="images/<?php echo $post_image; ?>" alt="Image">
                <input type="file" name="image">
            </p>

            <p class="form-group">
                <label for="post_tags">Post Tags</label>
                <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags; ?>">
            </p>

            <p class="form-group">
                <label for="post_content">Post Content</label> <br>
                <textarea class="form-control" name="post_content" id="" cols="30" rows="10" >
                
                <?php echo $post_content; ?>
                
                </textarea>
            </p>

            <p class="form-group">            
                <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
            </p>                        
        
       </div>     
    </form>
    