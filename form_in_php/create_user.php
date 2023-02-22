<?php
//ottengo informazione sul metodo usato per la richiesta che sto eseguendo
//mi stampa GET se sono appena entrato nella pagina
//mi stampa POST se ho ogià compilato il form
//print_r($SERVER);
print_r($_SERVER["REQUEST_METHOD"]);
if($_SERVER["REQUEST_METHOD"] === "POST"){
    echo "\nDati inviati, devono essere controllati.";
}else{
    echo "\nL' utente deve ancora compilare.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<header class="bg-light p-1">
    <h1 class="display-6">Applicazione demo</h1>
</header>

<main class="container">
    <section class="row">
        <div class="col-sm-4">

        </div>

        <div class="col-sm-4">
            <form class="mt-1 mt-md-5" action="create_user.php" method="post">
                <!-- dati utente -->
                <div class="mb-3">
                    <label for="nome" class="form-label">nome</label>
                    <input type="nome" class="form-control is-invalid" name="first_name"id="nome">
                    <div class="invalid-feedback">
                        Campo obbligatorio
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="cognome" class="form-label">cognome</label>
                    <input type="cognome" class="form-control is-invalid" name="last_name"id="cognome">
                    <div class="invalid-feedback">
                        Campo obbligatorio
                    </div>
                </div>

                <div class="mb-3">
                    <label for="data_di_nascita" class="form-label">data di nascita</label>
                    <!-- <input type="data_di_nascita" class="form-control" name="birthday"id="data_di_nascita"> -->
                    <input type="date" class="form-control is-invalid" id="birthday" name="birthday">
                    <div class="invalid-feedback">
                        Campo obbligatorio
                    </div>
                </div>

                <div class="mb-3">
                    <label for="luogo_di_nascita" class="form-label">luogo di nascita</label>
                    <!-- <input type="luogo_di_nascita" class="form-control" name="birth_place"id="luogo_di_nascita"> -->
                    <select class="form-control is-invalid" id="luogo_di_nascita">
                    <option value="none"></option>       
  <option value="AG">Agrigento</option>      
  <option value="AL">Alessandria</option>
  <option value="AN">Ancona</option>
  <option value="AO">Aosta</option>
  <option value="AR">Arezzo</option>
  <option value="AP">Ascoli Piceno</option>
  <option value="AT">Asti</option>
  <option value="AV">Avellino</option>
  <option value="BA">Bari</option>
  <option value="BT">Barletta-Andria-Trani</option>
  <option value="BL">Belluno</option>
  <option value="BN">Benevento</option>
  <option value="BG">Bergamo</option>
  <option value="BI">Biella</option>
  <option value="BO">Bologna</option>
  <option value="BZ">Bolzano</option>
  <option value="BS">Brescia</option>
  <option value="BR">Brindisi</option>
  <option value="CA">Cagliari</option>
  <option value="CL">Caltanissetta</option>
  <option value="CB">Campobasso</option>
  <option value="CE">Caserta</option>
  <option value="CT">Catania</option>
  <option value="CZ">Catanzaro</option>
  <option value="CH">Chieti</option>
  <option value="CO">Como</option>
  <option value="CS">Cosenza</option>
  <option value="CR">Cremona</option>
  <option value="KR">Crotone</option>
  <option value="CN">Cuneo</option>
  <option value="EN">Enna</option>
  <option value="FM">Fermo</option>
  <option value="FE">Ferrara</option>
  <option value="FI">Firenze</option>
  <option value="FG">Foggia</option>
  <option value="FC">Forl&igrave;-Cesena</option>
  <option value="FR">Frosinone</option>
  <option value="GE">Genova</option>
  <option value="GO">Gorizia</option>
  <option value="GR">Grosseto</option>
  <option value="IM">Imperia</option>
  <option value="IS">Isernia</option>
  <option value="AQ">L'aquila</option>
  <option value="SP">La spezia</option>
  <option value="LT">Latina</option>
  <option value="LE">Lecce</option>
  <option value="LC">Lecco</option>
  <option value="LI">Livorno</option>
  <option value="LO">Lodi</option>
  <option value="LU">Lucca</option>
  <option value="MC">Macerata</option>
  <option value="MN">Mantova</option>
  <option value="MS">Massa-Carrara</option>
  <option value="MT">Matera</option>
  <option value="ME">Messina</option>
  <option value="MI">Milano</option>
  <option value="MO">Modena</option>
  <option value="MB">Monza e Brianza</option>
  <option value="NA">Napoli</option>
  <option value="NO">Novara</option>
  <option value="NU">Nuoro</option>
  <option value="OR">Oristano</option>
  <option value="PD">Padova</option>
  <option value="PA">Palermo</option>
  <option value="PR">Parma</option>
  <option value="PV">Pavia</option>
  <option value="PG">Perugia</option>
  <option value="PU">Pesaro e Urbino</option>
  <option value="PE">Pescara</option>
  <option value="PC">Piacenza</option>
  <option value="PI">Pisa</option>
  <option value="PT">Pistoia</option>
  <option value="PN">Pordenone</option>
  <option value="PZ">Potenza</option>
  <option value="PO">Prato</option>
  <option value="RG">Ragusa</option>
  <option value="RA">Ravenna</option>
  <option value="RC">Reggio Calabria</option>
  <option value="RE">Reggio Emilia</option>
  <option value="RI">Rieti</option>
  <option value="RN">Rimini</option>
  <option value="RM">Roma</option>
  <option value="RO">Rovigo</option>
  <option value="SA">Salerno</option>
  <option value="SS">Sassari</option>
  <option value="SV">Savona</option>
  <option value="SI">Siena</option>
  <option value="SR">Siracusa</option>
  <option value="SO">Sondrio</option>
  <option value="SU">Sud Sardegna</option>
  <option value="TA">Taranto</option>
  <option value="TE">Teramo</option>
  <option value="TR">Terni</option>
  <option value="TO">Torino</option>
  <option value="TP">Trapani</option>
  <option value="TN">Trento</option>
  <option value="TV">Treviso</option>
  <option value="TS">Trieste</option>
  <option value="UD">Udine</option>
  <option value="VA">Varese</option>
  <option value="VE">Venezia</option>
  <option value="VB">Verbano-Cusio-Ossola</option>
  <option value="VC">Vercelli</option>
  <option value="VR">Verona</option>
  <option value="VV">Vibo valentia</option>
  <option value="VI">Vicenza</option>
  <option value="VT">Viterbo</option>
                    </select>
                    <div class="invalid-feedback">
                        Campo obbligatorio
                    </div>
                </div>
               

                <div class="mb-3">
                    <label for="sesso" class="form-label">sesso</label>
                    <!-- <input type="sesso" class="form-control" name="gender"id="sesso"> -->
                    <input type="radio" class="form-check-input is-invalid" name="gender" value="m"/>M
                    <input type="radio" class="form-check-input is-invalid" name="gender" value="f"/>F
                    <div class="invalid-feedback">
                        Campo obbligatorio
                    </div>
                    <!-- <select class="form-control" id="sesso">
	                <option value="none" selected></option>
	                <option value="M">M</option>
	                <option value="F">F</option>
	                </select> -->
                </div>

                <!-- nome utente(email) e password -->
                <div class="mb-3">
                    <label for="email" class="form-label">nome utente</label>
                    <input type="email" class="form-control is-invalid" name="username"id="email">
                    <div class="invalid-feedback">
                        Campo obbligatorio
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control is-invalid" name="password"id="password">
                    <div class="invalid-feedback">
                        Campo obbligatorio
                    </div>
                </div>

                <button class="btn btn-primary btn-sm"  type="submit"> Registrati </button>

        </div>

        <div class="col-sm-4">

        </div>

    </section>
</main>
    
</body>
</html>