<?php
namespace validator;

class ValidateDate implements Validable{

    /** @var string rappresenta il valore immesso nel form ripulito */
    private $value;
    private $message;

    /** se il valore è valido e se devo visualizzare il messaggio  */
    private $valid;

    public function __construct($default_value='',$message='❗️È obbligatorio😬') {
        $this->value = $default_value;
        $this->valid = true;
        $this->message = $message;
    }

    public function isValid($value){

        //trim()elimina gli spazi all' inizio e alla fine di una stringa
        //strip_tags() elimina i tag
        //riassegno
        //$sanitize = trim(strip_tags($value));//posso scriverli tutti su una riga 
        $strip_tag = strip_tags($value);
        $sanitize = trim($strip_tag);

        //j se avessi voluto il giorno senza lo 0 davanti
        $dt = \DateTime::createFromFormat("d/m/Y", $sanitize);
        //echo $value."\n";

        //echo $dt -> format("d/m/Y") . " === " . $sanitize . "\n";
        
        //basta che uno dei due sia false e non esegue
        //copre il caso "input" -> "ciccio"
        //print_r($dt && $dt -> format("d/m/Y") === $sanitize);

        //echo "\n----------\n"; // die();
        // 33/09/75 !==

        // se in expected mettessi una stringa, non me lo farebbe passare
        //controlla solo il formato, non i singoli valori, quindi i valori > 31 li fa passare
        if($dt && $dt -> format("d/m/Y") === $sanitize){
            return $dt -> format("d/m/Y");
        }else{
           return false;
           //return $dt; //non li fa passare quelli con numero > 31
        }; 
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