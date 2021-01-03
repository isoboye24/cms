<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    
    <h1>Hello student</h1>
    
    <?php
    
    //variables
    $name = "Isoboye Vincent";
    $age = 34;
    
        $website = "www.divcreation.info";
        
    ?>
    
    <h1>The owner of the website <i><?php echo $website;?></i> is <i><?php echo $name?></i>. Age: <i><?php echo $age ?></i></h1>
    
    <?php 
    //Array*********
    
    $names = array("Isaac", "Vincent");
        
    $namesAndKeys = array("name1" =>'Isaac', "name2"=>'Vincent');
        
        print_r($namesAndKeys);
    ?>
    
    
    
</body>
</html>