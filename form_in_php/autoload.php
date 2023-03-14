<?php

// AUTOLOAD HTML FRONTEND
spl_autoload_register(function($className){

    //C:\xampp\htdocs\corso_php_mysql_2223\form_in_php\class
    //pozizione di autoload __DIR__ così avremo sempre il percorso giusto
    //facciam oriferimento alla cartella dove sta autoload, che è class

    //concatenazione di stringhe
    $className = str_replace("\\", "/", __DIR__."/class/". $className . ".php");

    require $className;
});

?>