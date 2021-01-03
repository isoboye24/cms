<?php include "functions.php"; ?>
<?php include "includes/header.php";?>

	<section class="content">

	<aside class="col-xs-4">

	<?php Navigation();?>
			
	</aside><!--SIDEBAR-->


<article class="main-content col-xs-8">

<?php  

/*  Step1: Make an if Statement with elseif and else to finally display string saying, I love PHP



	Step 2: Make a forloop  that displays 10 numbers


	Step 3 : Make a switch Statement that test againts one condition with 5 cases

 */
$score = 6;
if($score < 5)
{
    echo "I do not like PHP";
}

else if($score >= 5 && $score <=8)
{
    echo "I like PHP not so much";
}

if($score > 8)
{
    echo "I love PHP";
}
echo "<br> <br>";
    
    
$count = 0;
for($i = $count; $i < 10; $i++)
{
    echo $i . " ";
}
    
 echo "<br> <br>";   
    
$rate = 8;

switch($rate)
{
    case 0:
    case 1:
        echo "I hate PHP";
        break;
   case 2:
    case 3:
        echo "I don't PHP";
        break;
   case 4:
    case 5:
        echo "I like PHP";
        break;
   case 6:
    case 7:
        echo "I like PHP very well";
        break;
   case 8:
    case 9:
    case 10:
        echo "I love PHP";
        break;
    default:
        echo "Invalid";
        break;
}
	
?>






</article><!--MAIN CONTENT-->
	
<?php include "includes/footer.php"; ?>