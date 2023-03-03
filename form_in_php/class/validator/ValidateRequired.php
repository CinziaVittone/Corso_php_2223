<?php
/*
-preservare il valore iniziale valido e ripulito del campo di testo (se inserisco Cinzia non voglio che sia cancellato)
-visualizzare il messaggio di errore per il singolo campo
    -sapere se c' è un erroe **is valid()**
    -ripulire e controllare i valori (sicurezza)
    -ogni validazione ha il suo messaggio di errore
    -impostare la classe di Bootstrap is-invalid
*/

class ValidateRequired implements Validable{

    /** @var string rappresenta il valore immesso nel form ripulito */
    private $value;
    private  $message;
    private $hasMessage;
     /** se il valore è valido e se devo visualizzare il messaggio  */
    private $valid;

    public function __construct($default_value="", $message="È obbligatorio" ){
        $this -> value = $default_value;
        $this -> valid = true;
        $this -> message = $message;
    }

    public function isValid($value){
        //metodo trim()elimina gli spazi all' inizio e alla fine di una stringa
        //metodo strip_tags() elimina i tag
        $strip_tag = strip_tags(($value));
        //posso scriverli entrambi su una riga 
        $valueNoSpace = trim($strip_tag);

        if($valueNoSpace == ""){
            $this -> valid = false;
            return false;
        }
        $this -> valid = true;
        $this -> value = $valueNoSpace;
        return $valueNoSpace;
        //se restituisco questa non super il test
        //return $value;
    }

    public function getValue(){
        return $this -> value;
    }

    public function getMessage(){
        //in base al campo cambierà, questo è generico
        return $this -> message;
    }

    public function getValid()
    {
      return $this->valid;
    }
}

?>

