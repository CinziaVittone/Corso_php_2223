<?php

use Registry\it\Provincia;

require "./form_in_php/config1.php";

require "./form_in_php/class/registry/it/Provincia.php";

$province = Provincia::all();

print_r($province);

?>