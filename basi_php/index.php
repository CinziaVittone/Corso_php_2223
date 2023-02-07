<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basi_php</title>
</head>
<body>
    <h1>Ciao</h1>
    <!-- fuori dal tag php sono in html -->
    <?php
    error_reporting(E_ALL);
    // dentro il tag php scrivo in php
    // $ variabile
    // ; obbligatorio a fine istruzione
    $nome="Mario"; //VARIABILE PIU' GENERALE
    $eta=50;
    $passatempi=array("Tennis", "Cinema", "No sport");
    // DICHIARAZIONE DELLA FUNZIONE, va richiamata per essere eseguita
    // funzione(argomento){corpo}

    // tutte le istruzioni dopo non vengono più eseguite
    // exit("Fino a qui tutto ok");
    function saluta($nome){ //VARIABILE LOCALE
        // si accorge che è una variabile per il $
        // senza bisogno di mettere il + 
        //DOUBLE QUOTE, virgolette doppie interpretano le variabii automaticamente

        // TEMPLATE LITERAL
        // in javascript
        // return 'Ciao io sono ${nome}, come va?'
        // in php
        // RITORNERA' UNA STRINGA
        return "Ciao io sono $nome, come va?";
    }
    
    // CREO OUTPUT
    echo "<h1>Stampo un contenuto sullo schermo</h1>";
    // CHIAMATA DELLA FUNZIONE
    echo saluta("Gianni");
    // . operatore che concatena le stringhe
    echo "<p>".saluta($nome)."</p>";
    echo "<div>".saluta($nome)."</div>";
    // genera un WARNING
    // echo $passatempi;

    // passatempi.length
    echo "<ul>";
    for($i=0; $i < count($passatempi); $i++){
        echo "<li>$passatempi[$i]</li>"; 
        // estrae di volta in volta $passatempi[0], $passatempi[1] ecc
    }
    echo "</ul>";

    $frase  = "Ciao io sono una frase";
    $frase .= "e io sono un altro pezzo della frase";
    $frase = $frase . "sono un altro pezzo ancora ";

    /**
     * posso scrivere una frase un pezzo alla volta
     * contatore = 0
     * contatore ++;
     * contatore = contatore + 4
     * contatore += 4
     */

    ?> 
</body>
</html>