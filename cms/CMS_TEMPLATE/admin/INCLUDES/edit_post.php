
   <form action="" method="post" enctype="multipart/form-data">
   <!--Enctype is in charge of sending form data.-->
           
       <div class="col-xs-6">
           
           <p class="form-group">
                <label for="title">Post Title</label>
                <input type="text" class="form-control" name="title">
           </p>          

            <p class="form-group">
                <label for="post_category">Post Category Id</label>
                <input type="text" class="form-control" name="post_category_id">
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
    