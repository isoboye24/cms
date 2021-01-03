<?php 

print_r($_GET);

?>


<?php include "../INCLUDES/header.php";?>

<?php 

$id = 10;
$button = "click here now";

?>


<a href="Get.php?id=<?php echo $id;?>"><?php echo $button;?></a>





<?php include "../INCLUDES/footer.php";?>