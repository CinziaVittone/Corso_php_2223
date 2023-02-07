<!-- <h1>Sono la risposta (RESPONSE)</h1> -->

<?php

// //$_GETè un array superglobale che esiste nel sistema
// //tag che impagina l' array
// echo "<pre>";
// echo "get: ";
// print_r($_GET);//array super globale del get
// echo "post: ";
// print_r($_POST);//array super globale del post
// echo "</pre>";

// echo "La tua email è <br>";
// echo "<strong>".$_POST['email']."</strong>"; //concatenazioni

/**
 * $ -> variabile
 * ""/'' -> stringa
 * -> COSTANTE, tutte le costanti sono GLOBALI
 */

//(argomenti)
//1.INPUT_GET è una COSTANTE
//2.variabile da ottenere con get è una "stringa"
//3.terzo argomento opzionale: filtro = controllo che faccio sui dati

$test=filer_input(INPUT_GET,"email",FILTER_VALIDATE_EMAIL);
 
if($test==false){
    echo "\nLa mail non è valida\n";
}else{
    echo "Grazie, la tua email è valida! :$test";
}
?>