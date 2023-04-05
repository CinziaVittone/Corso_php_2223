<?php

use validator\ValidateDate;

require "./form_in_php/class/validator/Validable.php";

require "./form_in_php/class/validator/ValidateDate.php";

$testCases = [
    [
        "input" => "      ",
        "expected" => false
    ],
    [
        "input" => "19/10/1997 ",
        "expected" => "19/10/1997"
    ],
    [
        "input" => " 19/10/1997 ",
        "expected" => "19/10/1997"
    ],
    [
        "input" => " 19/10/1997",
        "expected" => "19/10/1997"
    ],
    [
        "input" => "",
        "expected" => false
    ],
    [
        "input" => "<h1>19/10/1997</h1>",
        "expected" => "19/10/1997"
    ],
    [
        "input" => "<b>19/10/1997</b>",
        "expected" => "19/10/1997"
    ],
    [
        "input" => "<b>19/10/1997",
        "expected" => "19/10/1997"
    ],
    [
        "input" => "19/10/1997</b>",
        "expected" => "19/10/1997"
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
        "input" => "32/32/1997",
        "expected" => false
    ],
    [
        "input" => "19/32/1997",
        "expected" => false
    ],
    [
        "input" => "32/19/1997",
        "expected" => false
    ],
    [
        "input" => "19-10-1997",
        "expected" => false
    ],
    [
        "input" => "19#10/1997",
        "expected" => false
    ],
    [
        "input" => "ciccio",
        "expected" => false
    ],
    [
        "input" => "33/09/75",
        "expected" => false
    ]
    ];
    
    // key è ciò che permette di accedere alle info dell' array
    forEach($testCases as $key => $test){
        $input = $test["input"];
        $expected = $test["expected"];

        //validatore
        $v = new ValidateDate();

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