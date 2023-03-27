<?php

//error_reporting(E_ALL); li vede tutti
//error_reporting(0); li spegne tutti

use crud\UserCRUD;
use models\User;
use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidateRequired;
use validator\ValidatorRunner;

require "../config.php";
require "./autoload.php";
/* li commento ora che usiamo l' autoloading 
require "./class/validator/Validable.php";
require "./class/validator/ValidateRequired.php";
require "./class/validator/ValidateDate.php";
require "./class/validator/ValidateMail.php";
require "./class/registry/it/Regione.php";
require "./class/registry/it/Provincia.php";
*/

//come argomento un array, elenco delle validazioni che devo controllare
//le variabili idventano indici degli array coon dentro il validatore che serve
//array associativi
//registra le validazioni che dobbiamo eseguire
$validatorRunner = new ValidatorRunner([
    'first_name' => new ValidateRequired('','Il Nome è obbligatorio😬'),
    'last_name'  => new ValidateRequired('','Il Cognome è obbligatorio😬'),
    'birthday'  => new ValidateDate('','La data di nascità non è valida😬'),
    'gender'  => new ValidateRequired('','Il Genere è obbligatorio😬'),
    'birth_city'  => new ValidateRequired('','La città  è obbligatoria😬'),
    'id_regione'  => new ValidateRequired('','La regione è obbligatoria😬'),
    'id_provincia'  => new ValidateRequired('','La provincia è obbligatoria😬'),

    'username'  => new ValidateRequired('','Lo username è obbligatorio😬'),
    // 'username:email'  => new ValidateMail('','Formato email non valido'),
    'password'  => new ValidateRequired('','La password è obbligatoria😬')
]);
extract($validatorRunner->getValidatorList());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $validatorRunner->isValid();

    echo "Il form è valido?";
  
    if($validatorRunner->getValid()){
        echo "IL FORM È VALIDO";
        $user = User::array_to_user($_POST);
        $crud = new UserCRUD();
        $crud -> create($user);

        //redirect: posso stabilire un utilizzo
        //header("location: http://www.google.com");
        //posso inserire un percorso relativo alla pagina con lista utenti registrati
        header("location:index_user.php");
    }
}

?>

<!-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Esercitazione Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <header class="bg-light p-1">
        <h1 class="display-6">Applicazione demo</h1>
    </header>
    <main class="container"> -->

    <!-- spostiamo header nel file che contiene la VIEW, per comodità creo un frammento che posso spostare -->
    <?php require "./class/views/head_view.php" ?> 
        <section class="row">
            <div class="col-sm-8">
                <form class="mt-1 mt-md-5" action="create_user_new.php" method="post">
                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nome</label>
                        <input type="text" 
                            value="<?= $first_name->getValue() ?>"
                            class="form-control <?php echo !$first_name->getValid() ? 'is-invalid':''  ?>" 
                            name="first_name" 
                            id="first_name"
                        >
                      
                        <?php if (!$first_name->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $first_name->getMessage() ?>
                            </div>
                        <?php endif ?>


                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Cognome</label>
                        <input type="text"
                               id="last_name"
                               value="<?= $last_name->getValue() ?>"
                               name="last_name" 
                               class="form-control <?php echo !$last_name->getValid() ? 'is-invalid':'' ?>"
                               >
                        <?php if (!$last_name->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $last_name->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="birthday" class="form-label">Data Di Nascita</label>
                        <input type="date"
                               value="<?= $birthday->getValue() ?>"
                               class="form-control <?php echo !$birthday->getValid() ? 'is-invalid':'' ?>" 
                               name="birthday" 
                               id="birthday">
                        
                        <?php if (!$birthday->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $birthday->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>


                <div class="mb-3">
                    <div class="row">
                    <div class="col">
                        
                        <label for="birth_city" class="form-label">Città</label>
                        <input type="text" value="<?= $birth_city->getValue() ?>" class="form-control <?php echo !$birth_city->getValid() ? 'is-invalid':'' ?>" name="birth_city" id="birth_city">
                        
                        <?php if (!$birth_city->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $birth_city->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="col">
                        
                        <label for="birth_region" class="form-label">Regione</label>
                             <!-- select, voglio ottenere l'elenco regioni -->
                        <select id="birth_region" class="form-select birth_region" name="regione_id">
                                <option value=""></option>
                                <?php foreach(Regione::all() as $regione) : ?> 
                                    <option value="<?= $regione->id_regione ?>"><?= $regione->nome ?></option>
                                <?php endforeach;  ?>
                        </select>
                        <?php if (!$id_regione->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $id_regione->getMessage() ?>
                            </div>
                        <?php endif ?>  


                        </div>
                        <div class="col">
                        <label for="birth_province" class="form-label">Provincia</label>
                        <!-- select, voglio ottenere l'elenco province -->
                        <select id="birth_province" class="form-select birth_province" name="provincia_id">
                        <option value=""></option>
                                <?php foreach(Provincia::all() as $provincia) : ?> 
                                    <option value="<?= $provincia->id_provincia ?>"><?= $provincia->nome ?></option>
                                <?php endforeach;  ?>
                        </select>
                        <?php if (!$id_provincia->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $id_provincia->getMessage() ?>
                            </div>
                        <?php endif ?> 
                            
                    </div>
                    </div>
                </div>

                    <div class="mb-3">
                        <!-- <h1><?php echo $gender->getValue() == 'M' ? 'AA':'BB' ?></h1> -->
                        <label for="gender" class="form-label">Genere</label>
                        <select name="gender" class="form-select <?php echo !$gender->getValid() ? 'is-invalid' :'' ?>" id="gender">
                            <option value=""></option>
                            <option <?php echo $gender->getValue() == 'M' ? 'selected':''  ?> value="M">M</option>
                            <option <?php echo $gender->getValue() == 'F' ? 'selected':''  ?> value="F">F</option>
                        </select>
                        <?php
                        if (!$gender->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $gender->getMessage() ?>  
                            </div>
                        <?php endif; ?>
                        
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome Utente / EMAIL</label>
                        <input type="text"  value="<?php echo $username->getValue() ?>" class="form-control 
                            <?php echo (!$username->getValid() && !$username->getValid()) ? 'is-invalid':'' ?>" name="username" id="username">
                        <?php
                        //if (!$username_email->getValid()) : ?>
                            <div class="invalid-feedback">
                            <?php //echo $username_email->getMessage() ?>
                            </div>
                        <?php // endif ?>

                        <?php
                        if (!$username->getValid()) : ?>
                            <div class="invalid-feedback">
                            <?php echo $username->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" value="<?= $password->getValue()  ?>" id="password" name="password" class="form-control <?php echo !$password->getValid() ? 'is-invalid' : ''  ?>">
                        <?php
                        if (!$password->getValid()) : ?>
                            <div class="invalid-feedback">
                               <?php echo $password->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>

                    <button class="btn btn-primary btn-sm" type="submit">Registrati</button>
                </form>
            </div>



      
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>