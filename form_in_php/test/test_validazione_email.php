<?php

//da terminale
//scan directory --> fammi vedere la directory in cui mi trovo, come ls
//dalla cartella dove sei .
//entra dentro /
//$file = scandir("./form_in_php/class/validator/ValidateMail.php");
//print_r($files);//chiedo il risultato

//dal più annidato

//per importare un' interfaccia che ho in un altro file

use validator\ValidateMail;

require "./form_in_php/class/validator/Validable.php";

//per importare una classe che ho in un altro file
require "./form_in_php/class/validator/ValidateMail.php";

//elenco=array situazioni email sbagliata, dati con cui voglio fare le prove
//non sono obbligata a compilare il form
$emails=["a", "  ", "a@", "mario", "<h1>ciccio</h1>", "a<@.it"];

//classe ValidateMail
//$variabile = creo istanza della classe
//dovrò poi creare la classe
//dovrò poi implementare il metodo isValid() per la classe 
$v = new ValidateMail();

//oggetto.metodo/proprietà
//$v.isValid();
//(stringa che rappresenta la email
//$v -> isValid("a");
//$v -> isValid("   ");
//$v -> isValid("a@"):
//$v -> isValid("mario"):


//oppure ciclo per racchiudere tutti i casi
//ogni volta che vorrò verificare qualcosa basterà aggiungerlo all' array $emails
foreach ($email as $index => $email){

  if($v -> isValid($email)==false){
    echo "test superato per $email\n";
    //non lo stampo perchè a me interessa solo quando non va bene
  }else{
    echo "test numero $index non superato per [$email]\n";
  }
  //$v - > getMessage();
}


?>