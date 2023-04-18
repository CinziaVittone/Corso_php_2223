//è la mia cassetta degli attrezzi

//rif a thunder chiamata GET Users all
const base_url = "http://localhost/corso_php_2223/form_in_php/rest_api";

//export la rende visibile all' esterno, altrimenti è privato
export async function getUser() {
  //stampa in console l' url
  //console.log(base_url);

  //promise è un oggetto software
  //oggetto che ancora non contiene le informazioni, ma ti "prometto" che arriveranno
  //promessa che arriveranno i dati
  //return fetch(base_url + "/users.php").then((response) => response.json()); //retituisce una promessa

  //console.log("1 Promise", promise); //stampa Promise {<pending>}, in attesa di risposta

  //then() prende una callback come argomento
  //The callback to execute when the Promise is resolved.
  //funzione eseguita quando la promessa sarà avvenuta, quando i dati saranno arrivati
  //la callback della promessa contiene la risposta

  //risolvo la promessa
  //console.log("2 Then", response);
  //metodo .json() per convertire in formato che ci serve

  //console.log("3"); //eseguito prima del 2

  const response = await fetch(base_url + "/users.php");
  const json = await response.json();
  return json.data;
}
