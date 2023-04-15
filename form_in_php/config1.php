<?php
//print_r($_SERVER); //mostra le caratteristiche del mio server

$host = $_SERVER['HTTP_HOST'];

if($host == 'localhost'){
    //stringa che sarà il nome della costante
    //che useremo per connetterci
    //definiamo delle costanti
    /*credenziali per lavoro in locale*/
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "");
    define("DB_NAME", "form_in_php");
}

if($host == 'cinziavittone.000webhostapp.com'){
    /*credenziali date dall'host online*/
    define("DB_HOST", "localhost");
    define("DB_USER", "id20599766_cinzia_vittone");
    define("DB_PASSWORD", "Ciccia.5555!");
    define("DB_NAME", "id20599766_form_in_php");

}

//valido per entrambi
define("DB_DSN", "mysql:host=".DB_HOST.";dbname=".DB_NAME);


?>