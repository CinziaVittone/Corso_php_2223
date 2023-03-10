<?php

class Regione{

    //non passo argomenti perchè lel voglio sempre tutte
    public static function all()
    {
        try {
            //1. connessione al DB grazie alle costanti
            $conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            //2. query, il PDOStatement è il risultato della query, preparo la query
            $stm = $conn->prepare("SELECT * FROM regioni;");
            //3. lancio, eseguo la query
            $stm->execute();
            //4. qua ottengo il vero risultato
            //fetchAll() rende il risultato comprensibile per php
            //le diverse costanti FETCH restituiscono i dati in modo diverso
            $result = $stm->fetchAll(PDO::FETCH_OBJ); 
            //5. stampo il risultato
            return $result;
            /*
            qualsiasi eccezione in php può essere intercetata da \Throwable
            se mettessi \PDOException, lui intercetterebbe solo quelle eccezioni
            con \Throwable le intercetta tutte
            */
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
?>