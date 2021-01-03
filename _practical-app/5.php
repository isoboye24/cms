<?php include "functions.php"; ?>
<?php include "includes/header.php";?>
	<section class="content">

		<aside class="col-xs-4">
		<?php Navigation();?>
			
			
		</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

	
	<?php 


/*  Step1: Use a pre-built math function here and echo it


	Step 2:  Use a pre-built string function here and echo it


	Step 3:  Use a pre-built Array function here and echo it

 */

    $score = round(4.5);
    echo $score ."<br>";
    
    $score2 = floor(4.5);
    echo $score2."<br>";
    
    $squareRoot = sqrt(4.5);
    echo $squareRoot."<br>";
    
    $sentence = "I am here to test a string built-in function";
	$string = strlen($sentence);
    echo $string."<br>";
    
    $List = array(20, 20.1, 20.2, 20.3);
    $min = min($List);
    echo $min."<br>";
?>





</article><!--MAIN CONTENT-->
<?php include "includes/footer.php"; ?>