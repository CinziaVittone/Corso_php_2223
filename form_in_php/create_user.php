<?php

//error_reporting(E_ALL); li vede tutti
//error_reporting(0); li spegne tutti
require "./class/validator/Validable.php";
require "./class/validator/ValidateRequired.php";
//che a sua volta richiede l' interfaccia
// print_r($_POST);

print_r($_SERVER["REQUEST_METHOD"]);
//GET se sono appena entrato nella pagina
//POST se ho già compilato il form

$validatorName = new ValidateRequired("","❗️Il nome è obbligatorio😬");//istanza che valida il nome
$validatorSurname = new ValidateRequired("","❗️Il cognome è obbligatorio😬");
$validatorBirthday = new ValidateRequired("","❗️La data di nascita è obbligatoria😬");
$validatorBirthPlace = new ValidateRequired("","❗️Il luogo di nascita è obbligatorio😬");
$validatorUsername = new ValidateRequired("","❗️Lo username è obbligatorio😬");
$validatorGender = new ValidateRequired("","❗️Il genere è obbligatorio😬");
$validatorPassword = new ValidateRequired("","❗️La password è obbligatoria😬");


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    //altro modo al posto di mettere solo is--valid di bootstrap nella classe
    //metodo che controlla
    $validatedName = $validatorName->isValid($_POST["first_name"]);
    $validatedSurname = $validatorSurname -> isValid($_POST["last_name"]);
    $validatedBirthday = $validatorBirthday -> isValid($_POST["birthday"]);
    $validatedBirthPlace = $validatorBirthPlace -> isValid($_POST["birth_place"]);
    $validatedUsername = $validatorUsername -> isValid($_POST["username"]);
    $validatedGender= $validatorGender -> isValid($_POST["gender"]);
    $validatedPassword = $validatorPassword -> isValid($_POST["password"]);

    //usato peril caso del radio
    //$value = isset($_POST["gender"]) ? $_POST["gender"] : "";
    //$gender -> isValid($value); 
}


/** questo script viene eseguito quando visualizzo per la prima volta il form */
if ($_SERVER["REQUEST_METHOD"] == "GET") { 
    //  $validatedNameClass = $validatorName -> isValid($_POST["first_name"]) ? "" : "is-invalid";
    //  $validatedSurnameClass = $validatorSurname -> isValid($_POST["last_name"]) ? "" : "is-invalid";
    //  $validatedBirthdayClass = $validatorBirthday -> isValid($_POST["birthday"]) ? "" : "is-invalid";
    //  $validatedBirthPlaceClass = $validatorBirthPlace -> isValid($_POST["birth_place"]) ? "" : "is-invalid";
    //  $validatedUsernameClass = $validatorUsername -> isValid($_POST["username"]) ? "" : "is-invalid"; 
    //  $validatedGenderClass = $validatorGender -> isValid($_POST["gender"]) ? "" : "is-invalid";
    //  $validatedPasswordClass = $validatorPassword -> isValid($_POST["password"]) ? "" : "is-invalid";
}

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
                ciccio
            </div>
            <div class="col-sm-6">
                <form class="mt-1 mt-md-5" action="create-user.php" method="post">

                    <!-- DATI UTENTE -->

                    <div class="mb-3">
                        <!-- NAME -->
                        <label for="first_name" class="form-label">nome</label>
                        <input type="text" value="<?= $validatorName->getValue() ?>"
                        class="form-control <?php echo !$validatorName->getValid() ? 'is-invalid':'' ?>" name="first_name" id="first_name">
                        <!-- mettere is-invalid -->
                        <?php
                        //GET isset($validatedName) prova a usare una variabile e se non esiste(false) non da warning
                        //POST isset($validatedName) in questo caso da true, nel nostro caso
                        if (!$validatorName->getValid()) { ?>
                            <div class="invalid-feedback">
                                <?php echo $validatorName->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                    <div class="mb-3">
                        <!-- LAST_NAME -->
                        <label for="last_name" class="form-label">cognome</label>
                        <input type="text" value="<?= $validatorSurname->getValue() ?>"
                        class="form-control <?php echo !$validatorSurname->getValid() ? 'is-invalid':'' ?>" name="last_name" id="last_name">
                        <?php
                        if (!$validatorSurname->getValid()) { ?>
                            <div class="invalid-feedback">
                                <?php echo $validatorSurname->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                    <div class="mb-3">
                        <!-- BIRTHDAY -->
                        <label for="birthday" class="form-label">data di nascita</label>
                        <input type="date" value="<?= $validatorBirthday->getValue() ?>"
                        class="form-control <?php echo !$validatorBirthday->getValid() ? 'is-invalid':'' ?>" name="birthday" id="birthday">
                        <?php
                        if (!$validatorBirthday->getValid()) { ?>
                            <div class="invalid-feedback">
                                <?php echo $validatorBirthday->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                    <div class="mb-3">
                        <!-- BIRTHPLACE -->
                        <label for="birth_place" class="form-label">luogo di nascita</label>
                        <input type="text" value="<?= $validatorBirthPlace->getValue() ?>"
                        class="form-control <?php echo !$validatorBirthPlace->getValid() ? 'is-invalid':'' ?>" name="birth_place" id="birth_place">
                        <?php
                        if (!$validatorBirthPlace->getValid()) { ?>
                            <div class="invalid-feedback">
                                <?php echo $validatorBirthday->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                    <div class="mb-3">
                        <!-- GENDER -->
                        <label for="gender" class="form-label">genere</label>
                        <select name="gender" value="<?= $validatorGender->getValue() ?>"
                        class="form-select <?php echo !$validatorGender->getValid() ? 'is-invalid':'' ?>" name="gender" id="gender">
                            <option value=""></option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                        <?php
                        if (!$validatorGender->getValid()) { ?>
                            <div class="invalid-feedback">
                            <?php echo $validatorGender->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                    <div class="mb-3">
                        <!-- USERNAME -->
                        <label for="username" class="form-label">nome utente</label>
                        <input type="text" value="<?= $validatorUsername->getValue() ?>"
                        class="form-control <?php echo !$validatorUsername->getValid() ? 'is-invalid':'' ?>" name="username" id="username">
                        <?php
                        if (!$validatorUsername->getValid()) { ?>
                            <div class="invalid-feedback">
                            <?php echo $validatorUsername->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>


                    <div class="mb-3">
                        <!-- PASSWORD -->
                        <label for="password" class="form-label">password</label>
                        <input type="text" value="<?= $validatorPassword->getValue() ?>"
                        class="form-control <?php echo !$validatorPassword->getValid() ? 'is-invalid':'' ?>" name="password" id="password">
                        <?php
                        if (!$validatorPassword->getValid()) { ?>
                            <div class="invalid-feedback">
                            <?php echo $validatorPassword->getMessage() ?>
                            </div>
                        <?php
                        }
                        ?>
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
