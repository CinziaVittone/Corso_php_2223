<?php
//percorso dove trovare le costanti
include "config.php";

//estraiamo dal file json: file che voglio aprire come stringa
$province_string = file_get_contents("province.json");

//la converto in oggetto
$province_object = json_decode($province_string);

//var_dump($province_object);

$province_array = array_map(function($provincia){
    return
    [
        "nome" => $provincia -> nome,
        "sigla" => $provincia -> sigla
        //"id_regione" => 
    ];
},$province_object);


//ordino l' arrray
sort($province_array);

var_dump($province_array);

//connessione: tecnologia mysql/oracle
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;



?>