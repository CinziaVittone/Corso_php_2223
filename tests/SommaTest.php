<?php
use PHPUnit\Framework\TestCase;
// vedendo la parola test nel nome del file capisce che è un test
class SommaTest extends TestCase{
    
    // se tolgo la parola test lo disattivo
    public function test_somma()
    {
        // assertEquals() = mi aspetto di
        // (ottenere, come, messaggio di fallimento)
        $this -> assertEquals(10, 5+5, "5+5 non ha dato 10 :(");
        
        $colori = ['verde', 'bianco', 'rosso'];
        // (numero elementi, array)
        $this -> assertCount(3, $colori);
    }
}

