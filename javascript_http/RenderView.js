//metterò le funzioni di visualizzazione
//come argomento un qualunque elemento
function UsersList(array_users, element_selector) {
  //risolve a sua volta la promessa del metodo json
  //console.log(json); //finalmente passa il json, dati disponibili
  //////////DA AGGIORNARE QUANDO SISTEMO USERS CON DATA
  //console.log(json.data); quando avrò aggiunto data in users.php
  const lista_utenti = document.getElementById(element_selector);
  const elenco_utenti = array_users
    .map((user) => {
      //map permette di trasformare
      return "<li>" + user.first_name + " " + user.last_name + "</li>";
    })
    .join("\n"); //ogni elemento dell' array unito con questa stringa
  lista_utenti.innerHTML = elenco_utenti;
  //console.log(elenco_utenti);
}

//UserTable() //Function Expression
//CONST non si può riassegnare/ridichiarare
//(cosa prende, dove lo mette)
const UsersTable = (array_users, element_selector) => {
  //Template Literals/Strings = backtick (``), più facile posso andare a capo
  const html =
    `<table border="1" width="100%">
            <tr>
                <th>
                    🌷 NOME 🌷
                </th>
            </tr>` +
    array_users
      .map((user) => {
        return `<tr>
                    <td>
                    🌷${user.first_name}
                    </td>
                </tr>`;
      })
      .join("") +
    `</table>`;
  document.getElementById(element_selector).innerHTML = html;
  //${user.first_name} traduce la variabile
};

//altro modo di esportare la funzione senza usare export davanti
export { UsersList, UsersTable };
