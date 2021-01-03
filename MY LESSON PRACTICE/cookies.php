<?php 

//set a cookie for a year.
$name = "someone";
$value = 200;
$expiration = time() + (60*60*24*365);

setcookie($name, $value, $expiration);

?>


<?php include "INCLUDES/header.php";?>

<?php
    if(isset($_COOKIE["someone"]))
    {
        $visit = $_COOKIE["someone"];
        echo $visit;
    }
    else
    {
        $visit = "";
    }

?>


<?php include "INCLUDES/footer.php";?>