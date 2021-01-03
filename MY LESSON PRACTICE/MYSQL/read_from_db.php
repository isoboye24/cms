<?php include "db_connector.php";?>
<?php include "db_functions.php";?>

<?php include "../INCLUDES/header.php";?>
    
     <div class="container">
        <div class="col-sm-6">
         <h1 class="text-center">Read</h1>
         
         <pre>
             <?php ReadData(); ?>
         </pre>
         
        </div>
    </div>
    
<?php include "../INCLUDES/footer.php";?>