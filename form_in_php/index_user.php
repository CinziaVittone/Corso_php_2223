<?php

use crud\UserCRUD;
//si trovano nella root 
require "../config.php";
require "./autoload.php";

$users = (new UserCRUD())->read();
//print_r($users);

?>

<?php require "./class/views/head_view.php" ?>

<table class="table">
    <!-- riga -->
    <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Cognome</th>
        <th>Comune</th>
        <!-- per ogni utente devo vedere le sue info e modificrlo -->
        <th>Azioni</th>
    </tr>
    <!-- prendo elenco utenti dall'array quindi foreach, per ogni elemnto estraggo la proprietà -->
    <?php foreach ($users as $user) { ?>
    <tr>

        <td> <?= $user->user_id  ?>  </td>
        <td> <?= $user->first_name ?> </td>
        <td> <?= $user->last_name ?> </td>
        <td> <?= $user->birth_city ?> </td>
        <!-- la regione è una dipendenza, quindi serve una join -->
        <td>
            <a href= "edit_user.php?user_id=<?=$user -> user_id?>" class="btn btn-primary btn-xs">✏️Edit</a>
            <a href= "delete_user.php?user_id=<?=$user -> user_id?>" class="btn btn-danger btn-xs">❌Delete</button>
        </td>
       
    </tr>
    <?php }?>
</table>
<?php require "./class/views/footer_view.php" ?>