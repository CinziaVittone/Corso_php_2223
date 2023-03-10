<?php

//error_reporting(E_ALL); li vede tutti
//error_reporting(0); li spegne tutti
require "./class/validator/Validable.php";
require "./class/validator/ValidateRequired.php";
require "./class/validator/ValidateDate.php";
require "./class/validator/ValidateMail.php";
//che a sua volta richiede l' interfaccia
print_r($_POST);

print_r($_SERVER["REQUEST_METHOD"]);
//GET se sono appena entrato nella pagina
//POST se ho già compilato il form

$first_name = new ValidateRequired("","❗️Il nome è obbligatorio😬");//istanza che valida il nome
$last_name = new ValidateRequired("","❗️Il cognome è obbligatorio😬");
$birtday = new ValidateRequired("","❗️La data di nascita è obbligatoria😬");
$birth_place = new ValidateRequired("","❗️Il luogo di nascita è obbligatorio😬");
$username_required = new ValidateRequired("","❗️Lo username è obbligatorio😬");
$gender = new ValidateRequired("","❗️Il genere è obbligatorio😬");
$password = new ValidateRequired("","❗️La password è obbligatoria😬");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //altro modo al posto di mettere solo is--valid di bootstrap nella classe
    //metodo che controlla
    $first_name->isValid($_POST["first_name"]);
    $last_name-> isValid($_POST["last_name"]);
    $birtday-> isValid($_POST["birthday"]);
    $birth_place-> isValid($_POST["birth_place"]);
    $username_required-> isValid($_POST["username"]);
    $gender-> isValid($_POST["gender"]);
    $password-> isValid($_POST["password"]);

    //usato peril caso del radio
    //$value = isset($_POST["gender"]) ? $_POST["gender"] : "";
    //$gender -> isValid($value); 
}


/** questo script viene eseguito quando visualizzo per la prima volta il form */
//if ($_SERVER["REQUEST_METHOD"] == "GET") { 
    //  $validatedNameClass = $validatorName -> isValid($_POST["first_name"]) ? "" : "is-invalid";
    //  $validatedSurnameClass = $validatorSurname -> isValid($_POST["last_name"]) ? "" : "is-invalid";
    //  $validatedBirthdayClass = $validatorBirthday -> isValid($_POST["birthday"]) ? "" : "is-invalid";
    //  $validatedBirthPlaceClass = $validatorBirthPlace -> isValid($_POST["birth_place"]) ? "" : "is-invalid";
    //  $validatedUsernameClass = $validatorUsername -> isValid($_POST["username"]) ? "" : "is-invalid"; 
    //  $validatedGenderClass = $validatorGender -> isValid($_POST["gender"]) ? "" : "is-invalid";
    //  $validatedPasswordClass = $validatorPassword -> isValid($_POST["password"]) ? "" : "is-invalid";
//}

?>


<!doctype html>
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
    <main class="container">

        <section class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <form class="mt-1 mt-md-5" action="create-user.php" method="post">

                    <!-- DATI UTENTE -->

                    <div class="mb-3">
                        <!-- NAME -->
                        <label for="first_name" class="form-label">nome</label>
                        <input type="text" value="<?= $first_name->getValue() ?>"
                        class="form-control <?php echo !$first_name->getValid() ? 'is-invalid':'' ?>" name="first_name" id="first_name">
                        <!-- mettere is-invalid -->
                        <!-- GET isset($validatedName) prova a usare una variabile e se non esiste(false) non da warning
                        POST isset($validatedName) in questo caso da true, nel nostro caso -->
                        <?php if (!$first_name->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $first_name->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>


                    <div class="mb-3">
                        <!-- LAST_NAME -->
                        <label for="last_name" class="form-label">cognome</label>
                        <input type="text" value="<?= $last_name->getValue() ?>"
                        class="form-control <?php echo !$last_name->getValid() ? 'is-invalid':'' ?>" name="last_name" id="last_name">
                        <?php if (!$last_name->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $last_name->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>


                    <div class="mb-3">
                        <!-- BIRTHDAY -->
                        <label for="birthday" class="form-label">data di nascita</label>
                        <input type="date" value="<?= $birthday->getValue() ?>"
                        class="form-control <?php echo !$birthday->getValid() ? 'is-invalid':'' ?>" name="birthday" id="birthday">
                        <?php if (!$birtday->getValid()) : ?>
                            <div class="invalid-feedback">
                                <?php echo $birtday->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>


                    <div class="mb-3">
                        <!-- BIRTHPLACE -->
                        <label for="birth_place" class="form-label">luogo di nascita</label>
                        <input type="text" value="<?= $$birth_place->getValue() ?>"
                        class="form-control <?php echo !$$birth_place->getValid() ? 'is-invalid':'' ?>" name="birth_place" id="birth_place">
                        <?php if(!$birth_place->getValid()):?>
                            <div class="invalid-feedback">
                                <?php echo $birth_place->getMessage() ?>  
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                    <!-- BIRTHCITY -->
                        <div class="row">
                        
                   
                            <div class="col">
                                <label for="birth_city" class="form-label">città</label>
                                <input type="text" class="form-control" name="birth_city" id="birth_city">

                            </div>

                            <div class="col">

                                <label for="birth_region" class="form-label">regione</label>
                                <select class="birth_region "name="birth_region" id="birth_region">
                                    <?php foreach(Regione::all() as $regione) : ?>
                                        <!-- sintassi alternative di echo -->
                                    <option value="<?= $regione->id_regione?>"><?= $regione->nome?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col">
                                <label for="birth_province" class="form-label">provincia</label>
                                <select class="birth_province "name="birth_province" id="birth_province">
                                    <option value="12">Asti</option>
                                </select>
                            </div>



                        </div>

                    </div>


                    <div class="mb-3">
                        <!-- GENDER -->
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
                        <!-- USERNAME -->
                        <label for="username" class="form-label">Nome Utente / EMAIL</label>
                        <input type="text" class="form-control 
                            <?php echo (!$username_email->getValid() && !$username_required->getValid()) ? 'is-invalid':'' ?>" name="username" id="username">
                        <?php
                        if (!$username_email->getValid()) : ?>
                            <div class="invalid-feedback">
                            <?php echo $username_email->getMessage() ?>
                            </div>
                        <?php endif ?>

                        <?php
                        if (!$username_required->getValid()) : ?>
                            <div class="invalid-feedback">
                            <?php echo $username_required->getMessage() ?>
                            </div>
                        <?php endif ?>
                    </div>


                    <div class="mb-3">
                        <!-- PASSWORD -->
                        <label for="password" class="form-label">Password</label>
                        <input type="text" id="password" name="password" class="form-control <?php echo !$password->getValid() ? 'is-invalid' : ''  ?>">
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



            <div class="col-sm-3">

            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>
