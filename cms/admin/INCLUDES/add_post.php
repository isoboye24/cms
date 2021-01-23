<?php 

    if(isset($_POST['create_post']))
    {
//        Taking values from the inputs of the post page
        $post_category_id = Escape($_POST['post_category']);
        $post_title = Escape($_POST['title']);
        $post_user = Escape($_POST['post_user']);
        $post_status = Escape($_POST['post_status']);
        
        $post_image = Escape($_FILES['image']['name']);
        $post_image_temp = Escape($_FILES['image']['tmp_name']);

//        $post_date = date('d-m-y');
        $post_tags = Escape($_POST['post_tags']);
        $post_content = Escape($_POST['post_content']);
        
        //Function for uploading files
        move_uploaded_file($post_image_temp, "images/$post_image");
        
        //Insert data from the webpage to the db
        $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date, post_image, post_content, post_tags, post_status)";
        $query .= "VALUE('{$post_category_id}', '{$post_title}', '{$post_user}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
        
        $create_post_query = mysqli_query($connection, $query);
        
        ConfirmQuery($create_post_query);
        
//        This function returns the last id in the DB
        $the_post_id = mysqli_insert_id($connection);
        
        echo "Post created. <a class='bg-success'; href='../post.php?p_id={$the_post_id}'> View posts </a> or <a href='posts.php'> Edit more posts</a>";
    }

?>

   <form action="" method="post" enctype="multipart/form-data">
   <!--Enctype is in charge of sending form data.-->
           
       <div class="col-xs-6">
           
           <p class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" name="title">
           </p>          

             <p class="form-group">
<!--               To show the options of the category from the category table incase it also need to be changed-->
           <label for="category">Category:</label>
            <select class="form-control" name="post_category" id="">
                
<?php         
    
    $query = "SELECT * FROM categories ";
    $select_categories = mysqli_query($connection, $query);
                       
    ConfirmQuery($select_categories);                   
                       
    while($row = mysqli_fetch_assoc($select_categories))
    {
//        $escaped_cat_id = Escape('cat_id');
//        $escaped_cat_title = Escape('cat_title');        
            
        $cat_id = Escape($row['cat_id']);
        $cat_title = Escape($row['cat_title']);        
        
        echo "<option value='$cat_id'>{$cat_title}</option>";
        
    }

        
?>
             
             
              </select>
          
           </p>
           
           <p class="form-group">
<!--               To show the options of the users from the users -->
           <label for="users">Users:</label>
            <select class="form-control" name="post_user" id="">      
<?php         
    
    $user_query = "SELECT * FROM users ";
    $select_users = mysqli_query($connection, $user_query);
                       
    ConfirmQuery($select_users);                   
                       
    while($row = mysqli_fetch_assoc($select_users))
    {        
        $user_id = Escape($row['user_id']);
        $username = Escape($row['username']);
        
        echo "<option value='$username'>{$username}</option>";
        
    }

        
?>
            
              </select>
          
           </p>

           
            <p class="form-group">                
                <select class="form-control" name="post_status" id="">
                      <option value="Draft">Post Status</option>
                      <option value="Published">Published</option>
                      <option value="Draft">Draft</option>                     
               </select>                
            </p>

            <p class="form-group">
                <label for="post_image">Post Image</label>
                <input type="file" class="form-control" name="image">
            </p>

            <p class="form-group">
                <label for="post_tags">Post Tags</label>
                <input type="text" class="form-control" name="post_tags">
            </p>

            <p class="form-group">
                <label for="post_content">Post Content</label> <br>
                <textarea class="form-control" name="post_content" id="body" cols="30" rows="10">

                </textarea>
            </p>

            <p class="form-group">            
                <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
            </p>                        
        
       </div>     
    </form>
    