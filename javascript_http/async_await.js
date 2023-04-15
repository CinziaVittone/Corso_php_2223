async function getUser() {
  const base_url =
    "http://localhost/corso_php_2223/form_in_php/rest_api/users.php";

  //THEN
  /*
//url(di users get read_all) + risorsa che voglio trovare
const promessa_responseHTTP = fetch(base_url + "users.php").then((res) => {
  return res.json();
});

const promessa_json = promessa_responseHTTP.then((json) => {
  console.log(json);
});
*/

  //AWAIT
  /*
//await = aspetta che fetch restituisca una promessa*/
  const response = await fetch(base_url + "/users.php");

  const json = await response.json();
  return json;
}

const users = await getUser(); //dati disponibili direttamente all' esterno

console.log(users);
