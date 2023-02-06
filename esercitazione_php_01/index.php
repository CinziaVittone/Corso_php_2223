<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Esercitazione 01</title>
</head>
<body>
    <?php

    $array2ul=array("Rossso", "Verde", "Viola");

    function array2ul($array){
        
        $list="<ul>";
        for($i=0; $i < count($array); $i++){
            $list .= "<li>$array[$i]</li>";
        }
        $list .= "</ul>";

        return $list;
    }

    //restituisce una list che contiene una stringa
    echo array2ul($array2ul);

    ?>
    
</body>
</html>