<?php

use crud\UserCRUD;
use models\User;

//ogni volta che lancio il test svuoto la tabella e questo sarà sempre il primo utente
//(new PDO(DB_DSN, DB_USER, DB_PASSWORD))->query("TRUNCATE TABLE user;"); 
include "./form_in_php/config1.php";
include "form_in_php/test/test_autoload.php";

$crud = new UserCRUD();
$user = new User();
$user -> first_name = "Giovanni";
$user -> last_name = "Raspini";
$user -> birth_city = "Reggio Calabria";
$user -> birthday = "1970-03-07";
$user -> gender = "M";
$user -> id_regione = "3";
$user -> id_provincia = "81";
$user -> username = "giovanniraspini@gmail.com";
$user -> password = md5('Password');


//READ
//0.DATABASE VUOTO(leggo prima di creare)
$result = $crud->read_all(); //7 array | vuoto 
if($result === false ){
    echo "\nDatabase iniziale vuoto\n";
};

//CREATE
$crud -> create($user);

//READ
//1.UTENTE ESISTENTE
$result = $crud -> read_by_user_id(1);//user
//get_calss(&variabile) restituisce una stringa che è il nome della classe della variabile
if(class_exists(User::class) && get_class($result) == User::class){
    echo "\nTest read utente ESISTENTE superato\n";
}
//print_r($result);

//2.UTENTE NON ESISTENTE
$result = $crud -> read_by_user_id(3);//false
if($result == false){
    echo "\nTest read utente NON ESISTENTE superato\n";
}
//print_r($result);

//3.TUTTI GLI UTENTI
$result = $crud -> read_all();//array | vuoto
if(is_array($result) && count($result) === 1){
    echo "\nTest read di TUTTI GLI UTENTI superato\n";
}
//print_r($result);

//DELETE poi lo sposto in un file a parte
$crud -> delete(1);
$result = $crud -> read_by_user_id(1);
if($result == false){
    echo "\nTest delete utente con user_id 1 superato\n";
}
//TODO: inserire un altro utente per testare la cancellazione singola
print_r($result ? "Non deve vedersi" : "sono un FALSE");//non si vedono i false
var_dump($result);//fa vedere sempre il risultato

//die(); //lo sposto alla fine della parte che voglio testare per fermarmi

?>