<?php
//includere la configurazione perchè serve alla classe

use Registry\it\Regione;

require "./form_in_php/config1.php";
//devo includere la classe
require "./form_in_php/class/registry/it/Regione.php";

//$regione = new Regione();
//$regioni->all(; //Array di (stdClass) regioni

//Metodo Statico può essere utilizzato senza creare un' istanza
$regioni = Regione::all();

print_r($regioni);

//commento di ciò che eseguo da terminale, posso lanciarlo da qua
//COMMAND SHIFT P
//TERMINAL: RUN SELECTED TEXT IN ACTIVE TERMINAL
#php form_in_php/test/test_regioni.php
?>