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
$user->regione_id = 9;
$user->provincia_id = 57;
$user->username = "luigiverdi@gmail.com";
$user->password = md5('Password');

$result = $crud->read(); //7 array | vuoto 
if($result === false ){
    echo "\nDatabase iniziale vuoto\n";
};

$crud->create($user);

$result = $crud->read(1); // User
if(class_exists(User::class) && get_class($result) == User::class ){
    echo "\nTest read utente esistente test superato\n";
}

// TODO: Update dello stesso utente

var_dump($result);



