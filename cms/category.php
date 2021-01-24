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
    
    if(isset($_GET['category']))
    {
        $post_category_id = Escape($_GET['category']);
    }
                
    $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id ";

    $select_all_posts_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_all_posts_query))
    {
        $post_id = Escape($row['post_id']);
        $post_title = Escape($row['post_title']);
        $post_author = Escape($row['post_author']);
        $post_date = Escape($row['post_date']);
        $post_image = Escape($row['post_image']);
        $post_content = Escape(substr($row['post_content'], 0, 1000));
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
<!--            The link is sending post_id to the post page which will catch the post_id and use it.-->
                <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author; ?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
            <hr>
            <img class="img-responsive" src="admin/images/<?php echo $post_image; ?>" alt="Image not found">
            <hr>
            <p><?php echo $post_content; ?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

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
       