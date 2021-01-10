
<?php 




    if(isset($_POST['create_post']))
    {
        
        $post_category_id = $_POST['post_category'];
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];       
        $post_status = $_POST['post_status'];       
                
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        
        $post_date = date('d-m-y');
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
//        $post_comment_count = 4;
        
        //Function for uploading files
        move_uploaded_file($post_image_temp, "images/$post_image");
        
        //Insert data from the webpage to the db
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
        $query .= "VALUE('{$post_category_id}', '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
        
        $create_post_query = mysqli_query($connection, $query);
        
        ConfirmQuery($create_post_query);
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
                <input type="text" class="form-control" name="author">
            </p>

            <p class="form-group">
                <label for="post_status">Post Status</label>
                <input type="text" class="form-control" name="post_status">
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
                <textarea class="form-control" name="post_content" id="" cols="30" rows="10">

                </textarea>
            </p>

            <p class="form-group">            
                <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
            </p>                        
        
       </div>     
    </form>
    