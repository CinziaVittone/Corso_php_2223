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
$user->provincia_id = 57;
$user->username = "luigiverdi@gmail.com";
$user->password = md5('Password');

//CREATE
$crud->create($user);
print_r($crud->read(1));

$user = $crud->read(1);
$user->first_name = "Paolo";
$user->last_name = "Azzurri";
$user->birthday = "2014-04-01";
$user->birth_city = "Roma";
$user->id_regione = "4";
$user->provincia_id = "8";
$user->gender = "M";
$user->username = "paoloazzurri@gmail.com";
$user->password = md5('Password');

print_r("\nModifiche effettuate: ".$crud->update($user)."\n");
print_r($crud->read(1));



?>