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
       $the_post_author = Escape($_GET['author']);
   }
                
//Catching the post_id sent by the index.php file by using the superglobal GET
    $query = "SELECT * FROM posts WHERE post_user = '{$the_post_author}' "; 
    
//    my code            
    $select_user_posts_query = mysqli_query($connection, $query);
    $row2 = mysqli_fetch_assoc($select_user_posts_query);
    $post_user = Escape($row2['post_user']);
?>
      
       <p class="lead">
            All posts by <?php echo $post_user; ?>
        </p>
<!--        my code-->

<?php
                
    $select_all_posts_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_all_posts_query))
    {
        $post_title = Escape($row['post_title']);
        $post_date = Escape($row['post_date']);
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
                <a href="#"><?php echo $post_title; ?></a>
            </h2>
            
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
            <hr>
            <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="Image not found">
            <hr>
            <p><?php echo $post_content; ?></p>            

            <hr>
        
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
       