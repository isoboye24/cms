<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
    

	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


	<article class="main-content col-xs-8">
	
	
	
	<?php  

	/*  Step 1 - Create a database in PHPmyadmin

		Step 2 - Create a table like the one from the lecture

		Step 3 - Insert some Data

		Step 4 - Connect to Database and read data

*/
        
        $connection = mysqli_connect('localhost', 'root', '', 'practical7');        
        
        if($connection)
        {
            echo "db connected";
        }
        else
        {
            echo "Connection failed";
        }
	echo "<br><br>";
	?>

<?php 

        
    function ReadData()
    {
        global $connection;
        $query = "SELECT * FROM logindetails";       
        $result = mysqli_query($connection, $query);

        if(!$result)
        {
            die('Query failed'.mysqli_error());
        }
        else
        {
            echo "Record read";
        }

        echo "<br><br>";
        while($row = mysqli_fetch_assoc($result))
        {
            print_r($row);
        }            
    }
        
        
?>
<pre>
    <?php ReadData();?>
</pre>


</article><!--MAIN CONTENT-->


<?php include "includes/footer.php"; ?>
