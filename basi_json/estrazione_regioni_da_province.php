<?php
//percorso dove trovare le costanti
include "config.php";

//estraiamo dal file json: file che voglio aprire come stringa
$province_string = file_get_contents("province.json");

//la converto in oggetto
$province_object = json_decode($province_string);

//var_dump($province_object);

$regioni_array = array_map(function($provincia){
    return $provincia -> regione;
},$province_object);

$regioni_unique = array_unique($regioni_array);

//ordino l'array
sort($regioni_unique);

//connessione: tecnologia mysql/oracle
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

try {
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);//suggerisce le costanti
    //mi assicuro che la svuoti ogni volta per evitare duplicati
    $conn -> query("TRUNCATE TABLE regioni");

    //inserimento ciclando sull' array delle regioni
    foreach ($regioni_unique as $regione) {

        $regione = addslashes($regione);
        $sql = "INSERT INTO regioni (nome) VALUES('$regione');";
        echo $sql . "\n";
        $conn -> query($sql);
        
    }


} catch (\Throwable $th) {
    throw $th;
}

//print_r($regioni_unique);
?>