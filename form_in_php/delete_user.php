<?php

use crud\UserCRUD;

require "./config1.php";
require "./autoload.php";

$user_id = filter_input(INPUT_GET, "user_id", FILTER_VALIDATE_INT);
if($user_id){
    (new UserCRUD) -> delete($user_id);
    echo "<script> location.href='index.php'; </script>";
}else{
    echo "\nProblemi con l' eliminazione!\n";
}
?>

