<?php

use crud\UserCRUD;

require "./config1.php";
require "./autoload.php";

print_r($_GET);

$user_id = filter_input(INPUT_GET, "user_id", FILTER_VALIDATE_INT);
if($user_id){
    (new UserCRUD) -> delete($user_id);
    header("location: index.php");//redirect alla pagina index
}else{
    echo "\nProblemi con l' eliminazione!\n";
}
?>

