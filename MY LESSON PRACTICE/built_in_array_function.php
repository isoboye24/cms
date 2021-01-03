<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <?php 
    $name = "Grace";
    $values = ["Iso", "Hope", $name];
    
    $found = in_array($name, $values);
    if($found)
    {
        echo "I finally found it";
    }
    else
    {
        echo "I could not find it";
    }
    
    
    ?>
    
    
</body>
</html>