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
       $the_post_id = $_GET['p_id'];
       $the_post_author = $_GET['author'];
   }
                
//Catching the post_id sent by the index.php file by using the superglobal GET
    $query = "SELECT * FROM posts WHERE post_author = '{$the_post_author}' "; 

    $select_all_posts_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_all_posts_query))
    {
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];

?>
        
           <h1 class="page-header">
                    Page Heading
                <small>Secondary Text</small>
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="#"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">
                All posts by <?php echo $post_author; ?>
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
     
     
      </div>

            <!-- Blog Sidebar Widgets Column -->
 <?php include "INCLUDES/sidebar.php"; ?>           

        </div>
        <!-- /.row -->

        <hr>

 <?php include "INCLUDES/footer.php"; ?>
       