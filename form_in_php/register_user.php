<?php

// versione iniziale
// print_r($_POST);

// $test=filer_input(INPUT_POST,"username",FILTER_VALIDATE_EMAIL);

// //user == false se email sbagliata
// if($test==false){
//     echo "\nAttenzione! Registrazione non avvenuta.\n";
// }else{
//     echo "Grazie, registrazione completata con successo! :$test";
// }

//versione finale

//$first_name=filter_input(INPUT_POST, "first_name", );

//problemi da evitare
//whitespace che restituisce una stringa | campo obbligatorio
//non compilo stringa "" | campo obbligatorio
//se compilato restituisce una stringa | success
//null se non passo dal form | errore o campo obbligatorio —> NON ESISTE IL VALORE, MANCA IL CAMPO

var_dump(INPUT_POST);

$first_name = filter_input(INPUT_POST,'first_name',FILTER_SANITIZE_SPECIAL_CHARS);
var_dump($first_name);

FILTER_VALIDATE_EMAIL;
var_dump(FILTER_VALIDATE_EMAIL);

?>