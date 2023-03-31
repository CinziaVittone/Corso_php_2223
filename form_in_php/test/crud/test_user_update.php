<?php
// include "../../../config.php";

use crud\UserCRUD;
use models\User;

include "config.php";
include "form_in_php/test/test_autoload.php";

(new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE user;");
$crud = new UserCRUD();

$user = new User();
$user->first_name = "Luigi";
$user->last_name = "Verdi";
$user->birth_city = "Milano";
$user->birthday = "1999-10-10";
$user->gender = "M";
$user->id_regione = 9;
$user->id_provincia = 57;
$user->username = "luigiverdi@gmail.com";
$user->password = md5('Password');

$crud->create($user);

print_r($crud->read(1));

//$user2 = new User();
//$user2 = $crud->read(1);
$user2->first_name = "Paolo";
$user2->last_name = "Azzurri";
$user2->birthday = "2014-04-01";
$user2->birth_city = "Roma";
$user2->id_regione = "4";
$user2->id_provincia = "8";
$user2->gender = "M";
$user2->username = "paoloazzurri@gmail.com";
$user2->password = md5('Password');

//UPDATE
$result = $crud->update(1, $user2);
if($result == 1){
    echo "\nUtente aggiornato . $result . \n";
}elseif($result>1){
    echo "\nTroppi utenti aggiornati";
}elseif($result==0){
    echo "\nNessun utente aggiornato";
}

/*
if($result>0) {
    print_r("\nModifiche effettuate: ".$result."\n");
} else {
    print_r("\nNessuna modifica: ".$result."\n");
}
*/

$result = $crud->read(); // array | vuoto 
if(is_array($result) && count($result) === 1 ){
    echo "\nRicerca di tutti gli utenti (1)\n";
};

var_dump($result);



?>