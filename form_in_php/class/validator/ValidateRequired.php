<?php

class ValidateRequired implements Validable{

    public function isValid($value){

        //trim()elimina gli spazi all' inizio e alla fine di una stringa
        //strip_tags() elimina i tag
        //riassegno
        $valueNoSpace = trim(strip_tags($value));//posso scriverli tutti su una riga 
        if($valueNoSpace == ""){
            return false;
        }
        return $valueNoSpace;
        //se restituisco questa non super il test
        //return $value;
    }
}

?>

