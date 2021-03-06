<?php include "INCLUDES/db.php"; ?>
<?php include "INCLUDES/header.php"; ?>

    <!-- Navigation -->
<?php include "INCLUDES/navigation.php"; ?>    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
<?php 
                
   if(isset($_GET['p_id']))
   {
       $the_post_id = Escape($_GET['p_id']);
   }
                
//Catching the post_id sent by the index.php file by using the superglobal GET
    $query = "SELECT * FROM posts WHERE post_status = 'published' "; 

    $select_all_posts_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_all_posts_query))
    {
        $post_title = Escape($row['post_title']);
        $post_author = Escape($row['post_date']);
        $post_date = Escape($row['post_title']);
        $post_image = Escape($row['post_image']);
        $post_content = Escape($row['post_content']);
        $post_tags = Escape($row['post_tags']);
        $post_comment_count = Escape($row['post_comment_count']);
        $post_status = Escape($row['post_status']);        
?>
        
           <h1 class="page-header">
                    Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="post_comment.php?&p_id=<?php echo $the_post_id; ?>"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
            <hr>
            <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="Image not found">
            <hr>
            <p><?php echo $post_content; ?></p>            

            <hr>
        
    <?php
        
        }
    ?>
       
<?php
                
     if(isset($_POST['create_comment']))
     {
         $the_post_id = $_GET[Escape('p_id')];
         
         $comment_author = $_POST[Escape('comment_author')];
         $comment_email = $_POST[Escape('comment_email')];
         $comment_content = $_POST[Escape('comment_content')];
         
         $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) ";
         
         $query .= "VALUE($the_post_id, '{$comment_author}', '{$comment_email}', '{$comment_content}', 'Unapproved', 'now()') ";
         
         $create_comment = mysqli_query($connection, $query);
         
         if(!$create_comment)
         {
             die("QUERY FAILED ". mysqli_error($connection));
         }
         
         
         // query to increment the post comment count                        
        $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";            
        $query .= "WHERE post_id = $the_post_id ";            

        $update_comment_query = mysqli_query($connection, $query);  
         
     }        
                
?>
            
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" role="form">
                      <div class="form-group">
                         <label for="author">Author</label>
                          <input type="text" class="form-control" name="comment_author" required>
                      </div>
                       <div class="form-group">
                         <label for="email">Email</label>
                          <input type="email" class="form-control" name="comment_email" required>
                      </div>
                                              
                        <div class="form-group">
                           <label for="Comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3" required></textarea>
                        </div>
                        
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>
           <hr>

                <!-- Posted Comments -->
                
<?php
 
     $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";               
     $query .= "AND comment_status = 'approved' ";               
     $query .= "ORDER BY comment_id DESC ";               

     $select_comment_query = mysqli_query($connection, $query);
     if(!$select_comment_query)
     {
         die("QUERY FAILED ". mysqli_error($connection));
     }

     while($row = mysqli_fetch_array($select_comment_query))
     {
         $comment_date = Escape($row['comment_date']);
         $comment_content = Escape($row['comment_content']);
         $comment_author = Escape($row['comment_author']);         
?> 
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                            <?php echo $comment_content; ?>
                    </div>
                </div>                                   
                                                         
<?php       
     }               
?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
 <?php include "INCLUDES/sidebar.php"; ?>           

        </div>
        <!-- /.row -->

        <hr>

 <?php include "INCLUDES/footer.php"; ?>
       