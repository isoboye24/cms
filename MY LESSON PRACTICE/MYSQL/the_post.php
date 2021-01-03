<?php 

echo $_POST['name'];


?>


<?php include "../INCLUDES/header.php";?>

<form action="the_post.php" method="post">
    <input type="text" name="name">
    <input type="submit" name="submit">
</form>







<?php include "../INCLUDES/footer.php";?>