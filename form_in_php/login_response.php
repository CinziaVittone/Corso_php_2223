<h1>Sono la risposta (RESPONSE)</h1>

<?php

//$_GETè un array superglobale che esiste nel sistema
//tag che impagina l' array
echo "<pre>";
echo "get: ";
print_r($_GET);//array super globale del get
echo "post: ";
print_r($_POST);//array super globale del post
echo "</pre>";

echo "La tua email è <br>";
echo "<strong>".$_POST['email']."</strong>"; //concatenazioni

?>