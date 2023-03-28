<?php

use crud\UserCRUD;
use models\User;

//ogni volta che lancio il test svuoto la tabella e questo sarà sempre il primo utente
//(new PDO(DB_DSN, DB_USER, DB_PASSWORD))->query("TRUNCATE TABLE user;"); 
include "config.php";
include "form_in_php/test/test_autoload.php";

$crud = new UserCRUD();
$user = new User();
$user -> first_name = "Giovanni";
$user -> last_name = "Raspini";
$user -> birth_city = "Reggio Calabria";
$user -> birthday = "1970-03-07";
$user -> gender = "M";
$user -> id_regione = "3";
$user -> provincia_id = "81";
$user -> username = "giovanniraspini@gmail.com";
$user -> password = md5('Password');

//CREATE
//$crud -> create($user);
//$crud -> create($user);//per verificare che dia errore se lo duplico

//READ
$result = $crud -> read();

if(count($resul) == 1){
    echo "Test utente inserito OK";
}

print_r($result);

try{
    $crud -> create($user);
}catch(\Throwable $th){
    if($th -> getCode() == "23000"){
        echo "Test superato";
    }
}

?>