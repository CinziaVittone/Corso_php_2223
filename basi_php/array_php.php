<?php
#questo è un altro modo di fare i commenti
echo "ciao";

$nome="Sofocle";
//doppi apici interpretano variabili e caratteri speciali
// \t lascia uno spazio
echo "\tciao $nome \n";
//apici singoli non interpretano variabili e caratteri speciali
//stampano esattamente ciò che scrivo
echo '\tciao $nome \n';

#Index Array
// $colori = array();
$colori = ["red", "green", "blue"];
echo "\n\n".$colori[2]."\n";

#Associative Array (HashMap)
$persona = [
    "nome"=> "Mario",
    "cognome"=>"Rossi",
    "email"=>"mariXred@gmail.com"
];

//console.log(persona);
print_r($persona);

//non stampa valori complessi diversi da una stringa o un numero
echo $persona["email"];

//Array to string conversion, da errore perchè non stampa un array
//echo $persona;

//Array indicizzato, alla pos 0 ha un array associativo con dentro le info della prima persona,
//e così via
$classe = array(
    [
        "nome"=> "Mario",
        "cognome"=>"Rossi",
        "email"=>"mariXred@gmail.com"
    ],

    [
        "nome"=> "Giuseppe",
        "cognome"=>"Verdi",
        "email"=>"giuXgreen@gmail.com"
    ]

    );

//stampo tutta la classe
print_r($classe);

//accedo alla chiave indice 0 e arrivo alla prima persona, 
//poi accedo alla chiave nome e arrivo a Mario
print_r($classe[0]["nome"]);

#For
#Imperativo (stile di programmazione in cui spiego i dettagli)
echo "Ciclo For\n";
for ($i=0; $i <count($classe) ; $i++) { 
    $allievo=$classe[$i];
    echo $allievo["nome"]."\n";
}

#For Each
echo "Ciclo ForEach\n";
foreach ($classe as $i => $allievo) {
    echo $allievo["nome"];
    echo"\n";
}

#For Each con parentesi
echo "Ciclo ForEach con parentesi\n";
foreach ($classe as $i => $allievo) {
    echo ($i+1)." ) ".$allievo["nome"];
    echo"\n";
}

#Array Map
#Funzione stampaNome
#Dichiarativo
echo "Funzione stampaNome dichiarata\n";
function stampaNome($allievo){
    echo $allievo["nome"]."\n";
}

//devo richiamarla per eseguirla
echo "Funzione stampaNome richiamata\n";
array_map("stampaNome", $classe);


?>