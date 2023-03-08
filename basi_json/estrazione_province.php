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
        "sigla" => $provincia -> sigla,
        "id_regione" => $provincia -> regione
    ];
},$province_object);

//ordino l' arrray
sort($province_array);

//connessione: tecnologia mysql/oracle
$dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

//analogo a esercizio regioni
try {
    $conn = new PDO($dsn, DB_USER, DB_PASSWORD);//suggerisce le costanti
    //mi assicuro che la svuoti ogni volta per evitare duplicati
    $conn -> query("TRUNCATE TABLE province");
    
    foreach($province_object as $provincia){
        
        $id_regione = $provincia -> regione;
        $nome = addslashes($provincia -> nome);
        $sigla = addslashes($provincia -> sigla);
        
        /*
        $pdo_stm = $conn -> query("SELECT id_regione FROM regioni WHERE nome = '$regione';");
        $id_regione = $pdo_stm -> fetchColumn();
        */
        $id_regione = $conn -> query("SELECT id_regione FROM regioni WHERE nome = \"$id_regione\"") -> fetchColumn();
        
        $sql = "INSERT INTO province(id_regione, nome, sigla) VALUES('$id_regione', '$nome', '$sigla');";
        echo $sql . "\n";
        $conn -> query($sql);
    }
    
}catch (\Throwable $th) {
    throw $th;
}

?>