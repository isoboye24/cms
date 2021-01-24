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
                        
<?php

    if(isset($_GET['source']))
    {
        $source = Escape($_GET['source']);
    }
    else
    {
        $source = '';
    }
                        
    switch($source)
    {
        case 'add_user';
        include "INCLUDES/add_user.php";
        break;
            
        case 'edit_user';
        include "INCLUDES/edit_user.php";
        break;
            
        case '200';
        echo "NICE 200";
        break;
            
        default:
        include "INCLUDES/view_all_users.php";    
        break;    
    }
?>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        
<?php  include "INCLUDES/admin_footer.php"; ?>