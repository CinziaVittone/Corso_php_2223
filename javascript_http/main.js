//è la mia applicazione principale
//prendo la cassetta degli attrezzi, chiamo tutti i pezzi che servono
//import è analogo a un require di php
import { getUser } from "./UserService.js";
import { UsersList, UsersTable } from "./RenderView.js";

// stessi dati, 2 rappresentazioni diverse

// restituisce -> PROMISE
getUser().then((json) => {
  UsersList(json, "lista_utenti"); //lisat_utenti come in index.html
});

getUser().then((json) => {
  // è una view, una vista che si occupa di rappresentare i dati
  alert(json[0]["first_name"] + " " + json[0]["last_name"]); //stampa il nome dell' utente a quella posizione, altrimenti undefined
  //////////DA AGGIORNARE QUANDO SISTEMO USERS CON DATA
  //alert(json.data[0]); quando avrò aggiunto data in users.php
});

//lista_utenti2 è passata in locale, non arriva dal browser
const user_locale = [
  {
    first_name: "Violet",
    last_name: "Evergarden",
    birthday: "1997-03-15",
    birth_city: "Savona",
    id_regione: 8,
    id_provincia: 89,
    gender: "F",
    username: "violetevergarden@gmail.com",
    password: "ccc333",
    user_id: 3,
  },
  {
    first_name: "Dorothy",
    last_name: "Rosa",
    birthday: "2003-11-17",
    birth_city: "Trapani",
    id_regione: 15,
    id_provincia: 97,
    gender: "F",
    username: "dorothyrosa@gmail.com",
    password: "ddd444",
    user_id: 4,
  },
];

UsersTable(user_locale, "lista_utenti2"); //lisat_utenti2 come in index.html
