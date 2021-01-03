<?php 

    $file = "example.txt";

    if($handle = fopen($file, 'w'))
    {
        fwrite($handle, 'I am writing on a txt file. Lol, it has already been written on it. Wow!!!. I am still checking if it is working.');

        fclose($handle);
    }
    else
    {
        echo "The application could not write on the file.";
    }
    
    //deleting a file
    unlink("delete_this_file.php");

?>