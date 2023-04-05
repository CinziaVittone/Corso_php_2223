<?php
//dal più annidato

//per importare un' interfaccia che ho in un altro file

use validator\ValidateRequired;

require "./form_in_php/class/validator/Validable.php";

//per importare una classe che ho in un altro file
require "./form_in_php/class/validator/ValidateRequired.php";

// ValidateRequired campo obbligatorio, quindi non deve essere vuoto
// false

// Test cases
$testCases = [
    [
        "input" => "      ",
        "expected" => false  
    ],
    [
        "input" => "ciao ",
        "expected" => "ciao"  
    ],
    [
        "input" => " ciao ",
        "expected" => "ciao"  
    ],
    [
        "input" => " ciao",
        "expected" => "ciao"  
    ],
    [
        "input" => "",
        "expected" => false
    ],
    [
        "input" => "<h1>ciao</h1>",
        "expected" => "ciao"  
    ],
    [
        "input" => "<b>ciao</b>",
        "expected" => "ciao"  
    ],
    [
        "input" => "ciao</b>",
        "expected" => "ciao"  
    ],
    [
        "input" => "<b>ciao",
        "expected" => "ciao"  
    ],
    [
        "input" => "<b>   </b>",
        "expected" => false  
    ],
    [
        "input" => "<b></b>",
        "expected" => false  
    ],
    [
        "input" => "<b>  ",
        "expected" => false  
    ],
    [
        "input" => 20,
        "expected" => 20
    ],
    [
        "input" => 0,
        "expected" => 0 
    ]

    ];

    // key è ciò che permette di accedere alle info dell' array
    forEach($testCases as $key => $test){
        $input = $test["input"];
        $expected = $test["expected"];

        //validatore
        $v = new ValidateRequired();

        //istanza con metodo
        //quando valore di input è uguale al valore che mi aspetto
        if($v -> isValid($input) != $expected){
            echo "\nTest con chiave $key non superato mi aspettavo: ";
            var_dump($expected);
            echo "\nMa ho trovato: ";
            var_dump($v -> isValid($input));
        }
    }
    
    
    ?>