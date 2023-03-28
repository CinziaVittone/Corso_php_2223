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


$user_id = filter_input(INPUT_GET, "user_id", FILTER_VALIDATE_INT);
$crud = new UserCRUD;
$user = $crud -> read($user_id);

print_r($_POST);//vedo i dati che passo nel post
//Array ( [first_name] => Mario [last_name] => Bros [birthday] => 2023-03-15 [birth_city] => Torino 
//[id_regione] => 12 [provincia_id] => 96 [gender] => M [username] => mariobros@gmail.com [password] => aaa111 )

//come argomento un array, elenco delle validazioni che devo controllare
//le variabili idventano indici degli array coon dentro il validatore che serve
//array associativi
//registra le validazioni che dobbiamo eseguire
$validatorRunner = new ValidatorRunner([
    'first_name' => new ValidateRequired($user -> first_name,'Il Nome è obbligatorio😬'),
    'last_name'  => new ValidateRequired($user -> last_name,'Il Cognome è obbligatorio😬'),
    'birthday'  => new ValidateDate($user -> birthday,'La data di nascità non è valida😬'),
    'gender'  => new ValidateRequired($user -> gender,'Il Genere è obbligatorio😬'),
    'birth_city'  => new ValidateRequired($user -> birth_city,'La città  è obbligatoria😬'),
    'id_regione'  => new ValidateRequired($user -> id_regione,'La regione è obbligatoria😬'),
    'id_provincia'  => new ValidateRequired($user -> provincia_id,'La provincia è obbligatoria😬'),

    'username'  => new ValidateRequired($user -> username,'Lo username è obbligatorio😬'),
    // 'username:email'  => new ValidateMail('','Formato email non valido'),
    'password'  => new ValidateRequired('','La password è obbligatoria😬')
    // TODO: in update usare la password se non è compilata rimane la stessa, se compilata viene cambiata
]);
extract($validatorRunner->getValidatorList());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $validatorRunner->isValid();

    echo "Sono nel post di edit_user";
  
    if($validatorRunner->getValid()){
        
        $user = User::array_to_user($_POST);
        $crud = new UserCRUD();
        $crud -> create($user);
        die();
        //redirect: posso stabilire un utilizzo
        //header("location: http://www.google.com");
        //posso inserire un percorso relativo alla pagina con lista utenti registrati
        header("location:index_user.php");
    }
}

?>

    <!-- spostiamo header nel file che contiene la VIEW, per comodità creo un frammento che posso spostare -->
    <?php require "./class/views/head_view.php" ?> 
        <section class="row">
            <div class="col-sm-8">
                <form class="mt-1 mt-md-5" action="edit_user.php" method="post">
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
                        <select id="birth_region" class="form-select birth_region" name="id_regione">
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