<?php

//creo la classe
class ValidateMail implements Validable{

    //TIPIZZAZIONE
    //gli passo un argomento di tipo striga
    //ritorna un booleano : bool
    //mixed = qualsiasi cosa
    public function isValid(mixed $email) : bool{
        // $strip_tag = strip_tags($value);
        // $valueNoSpace = trim($strip_tag);
        //filter_input prende dati da get, post --> per i form
        //simili
        //filter_var analizza i dati in una variabile --> più flessibile
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
?>