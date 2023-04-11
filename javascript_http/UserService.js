//è la mia cassetta degli attrezzi

//rif a thunder chiamata GET Users all
const base_url =
  "http://localhost/corso_php_2223/form_in_php/rest_api/users.php";

//export la rende visibile all' esterno, altrimenti è privato
export function getUser() {
  //stampa in console l' url
  //console.log(base_url);

  //promise è un oggetto software
  //oggeto che ancora non contiene le informazioni, ma ti "prometto" che arriveranno
  //promessa che arriveranno i dati
  const promise = fetch(base_url + "/users.php"); //retituisce una promessa

  console.log("1 Promise", promise); //stampa Promise {<pending>}, in attesa di risposta

  //then() prende una callback come argomento
  //The callback to execute when the Promise is resolved.
  //funzione eseguita quando la promessa sarà avvenuta, quando i dati saranno arrivati
  //la callback della promessa contiene la risposta
  promise
    .then((response) => {
      //risolvo la promessa
      console.log("2 Then", response);
      return response.json(); //metodo .json() per convertire in formato che ci serve
    })
    .then((json) => {
      //risolve a sua volta la promessa del metodo json
      console.log(json); //finalmente passa il json, dati disponibili
      const lista_utenti = document.getElementById("lista_utenti");
      const elenco_utenti = json
        .map((user) => {
          //map permette di trasformare
          console.log("Sono un utente ", user);
          return "<li>" + user.first_name + "</li>";
        })
        .join("|"); //ogni elemento dell' array unito con questa stringa
      lista_utenti.innerHTML = elenco_utenti;
      console.log(elenco_utenti);
    });

  console.log("3"); //eseguito prima del 2
}
