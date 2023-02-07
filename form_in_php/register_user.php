<?php

print_r($_POST);

$test=filer_input(INPUT_POST,"username",FILTER_VALIDATE_EMAIL);

//user == false se email sbagliata
if($test==false){
    echo "\nAttenzione! Registrazione non avvenuta.\n";
}else{
    echo "Grazie, registrazione completata con successo! :$test";
}


?>