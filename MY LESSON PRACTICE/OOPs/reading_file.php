<?php 

    $file = "example.txt";

    if($handle = fopen($file, 'r'))
    {
        echo $content = fread($handle, filesize($file)); //using file size to read all the contents irrespective of the size.

        fclose($handle);
    }
    else
    {
        echo "The app could not read the file.";
    }


?>