<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex31</title>
</head>
<body>


<?php

    echo "<h1>PROCESA CONTACTES</h1>";
    $contactes = file("contactes31.txt");
    $file = fopen("comanda31b.txt","a");
    echo "<ul>";
    foreach($contactes as $personal){
        echo "<li>$personal</li>";
        $contact = str_replace(",","#",$personal);
        fwrite($file, $contact);
    }
    echo "</ul>";
    fwrite($file,"\n");
    fclose($file);


?>


    
</body>
</html>