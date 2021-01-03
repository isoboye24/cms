<?php include "functions.php"; ?>
<?php include "includes/header.php";?>



	<section class="content">

		<aside class="col-xs-4">

		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


			<article class="main-content col-xs-8">
			
		
	
	<?php 

	/*  Create a link saying Click Here, and set 
	the link href to pass some parameters and use the GET super global to see it

	*/
	
        $id = 20;
        $button = "Click here";
    
	?>
    <a href="9.php?id=<?php echo $id; ?>"><?php echo $button; echo "<br><br>"?></a>

    <?php
        
//		Step 2 - Set a cookie that expires in one week

        $name = "myWeb";
        $value = 50;
        $expiration = time() + (60*60*24*7);
        
        setcookie($name, $value, $expiration);
    ?>
    
    <?php
        
        if(isset($_COOKIE['myWeb']))
        {
            $checkName = "myWeb";
            echo $checkName;
        }
        else
        {
            $checkName = "";
        }
                
        echo "<br><br>";
    ?>
    
    
<!--		Step 3 - Start a session and set it to value, any value you want.-->
    <?php session_start();
         echo $_SESSION['greeting'];       
    ?>
</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>