<?php  include "INCLUDES/admin_header.php"; ?>
<?php  include "functions.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php  include "INCLUDES/admin_navigation.php"; ?>
        
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>
                        
                        <div class="col-xs-6">

<!--    Add categories-->
  <?php InsertCategories(); ?> 
<!-- Add categories  -->                        

                            <form action="" method="post">
                               <label for="cat-title">Add Category </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div> 
                                
                            </form>
 
<!--Open edit form -->
<?php UpdateCategories(); ?>
                            
                         </div> <!--   Add category form-->
                         
                         
                         
                        <div class="col-xs-6"> <!--  category table -->                                                  

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>                                   

<!-- Find all categories -->
<?php FindAllCategories(); ?>


<!-- Delete category -->
<?php DeleteCategories(); ?>                                   
                                   
                                </tbody>
                            </table>
                        </div> <!--   Category table -->
                        
                        
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
<?php  include "INCLUDES/admin_footer.php"; ?>