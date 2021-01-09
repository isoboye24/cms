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


    ?>

   <form action="" method="post" enctype="multipart/form-data">
   <!--Enctype is in charge of sending form data.-->
           
       <div class="col-xs-6">
           
           <p class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $post_title ?>">
           </p>          

            <p class="form-group">
<!--               To show the options of the category from the category table incase it also need to be changed-->
                <select name="post_category" id="">
                
                
<?php
         
    //the category codes
        
?>
             
             
              </select>
          
           </p>

            <p class="form-group">
                <label for="author">Post Author</label>
                <input type="text" class="form-control" name="author" value="<?php echo $post_author ?>">
            </p>

            <p class="form-group">
                <label for="post_status">Post Status</label>
                <input type="text" class="form-control" name="post_status" value="<?php echo $post_status ?>">
            </p>

            <p class="form-group">
                <label for="post_image">Post Image</label>
                <img width="100" src="images/<?php echo $post_image ?>" alt="Image">
            </p>

            <p class="form-group">
                <label for="post_tags">Post Tags</label>
                <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags ?>">
            </p>

            <p class="form-group">
                <label for="post_content">Post Content</label> <br>
                <textarea class="form-control" name="post_content" id="" cols="30" rows="10" >
                
                <?php echo $post_content ?>
                
                </textarea>
            </p>

            <p class="form-group">            
                <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
            </p>                        
        
       </div>     
    </form>
    