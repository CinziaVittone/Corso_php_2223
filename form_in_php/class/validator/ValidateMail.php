<?php
namespace validator;
//creo la classe
class ValidateMail implements Validable{

     /** @var string rappresenta il valore immesso nel form ripulito */
    private $value;
    private $message;
    /** se il valore è valido e se devo visualizzare il messaggio*/
    private $valid;

    public function __construct($default_value='',$message='❗️È obbligatorio😬') {
        $this->value = $default_value;
        $this->valid = true;
        $this->message = $message;
    }

    //TIPIZZAZIONE
    //gli passo un argomento di tipo striga
    //ritorna un booleano : bool
    //mixed = qualsiasi cosa
    public function isValid(mixed $email) : bool{
        $strip_tag = strip_tags($email);
        $valueNoSpace = trim($strip_tag);
        //filter_input prende dati da get, post --> per i form
        //simili
        //filter_var analizza i dati in una variabile --> più flessibile
        return filter_var($valueNoSpace, FILTER_VALIDATE_EMAIL);
    }

    public function getValue()
    {
      return $this->value;
    }
   
    public function getMessage()
    {
      return $this->message;
    }
   
    public function getValid()
    {
      return $this->valid;
    }
}
?>