<?php
// tasto dx sul file - copy relative path
# php form_in_php/test/crud/test_array_to_user.php

use models\User;
require "form_in_php/test/test_autoload.php";

//$_POST
$class_array=[
    "first_name" => "Violet",
    "last_name" => "Evergarden",
    "birthday" => "1997-06-15",
    "birth_city" => "Siena",
    "regione_id" => 16,
    "provincia_id" => 90,
    "gender" => "F",
    "username" => "violet97@gmail.com",
    "password" => "Password"
];

//$class_name = User::class;
//$user = new $class_name;

$user = User::array_to_user($class_array);

if(get_class($user) == User::class){
    echo "\nTest superato, è un oggetto di tipo {User::class}\n";
    print_r($user);
}


?>