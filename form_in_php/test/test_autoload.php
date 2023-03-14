<?php

use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidateRequired;

//per includere le costanti (DB_DSN,DB_USER,DB_PASSWORD) che usano Regione e Provincia
require "./config.php";
spl_autoload_register(function($className){

    echo "\nSto cercando $className\n";

    $className = str_replace("\\", "/", $className);

    include "./form_in_php/class/".$className.".php";

});

new ValidateMail();//dava errore quindi uso il suggerimento e scrive use validator\ValidateMail
new ValidateDate();
new ValidateRequired();

Regione::all();
Provincia::all();
?>