<form action="" method="post">
                               <label for="cat-title">Edit Category </label>
                               
<?php 
       // Edit categories
        
        if(isset($_GET['edit']))
        {
            $cat_id = Escape($_GET['edit']);
            
            $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
            $select_categories_id = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_categories_id))
            {
                $cat_id = Escape($row['cat_id']);
                $cat_title = Escape($row['cat_title']);                
?>
 
                 <input value="<?php if(isset($cat_title)) {echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">
 
<?php          
            }
            
        }      
?>

<?php                                     
   
    // Update edited category
                                    
    if(isset($_POST['update_category']))
    {
        $the_cat_title = Escape($_POST['cat_title']);
        
        $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
        $update_query = mysqli_query($connection, $query);
        
        if(!$update_query)
        {
            die("Update edit query failed". mysqli_error($connection));
        }
        
        header("location: categories.php"); //The refreshes the page to avoid double clicking before the above action takes place.
    }
 ?>
                                       
                               
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update">
                                </div>
                                
                            </form>