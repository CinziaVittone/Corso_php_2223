const primari_additivi = ["rosso", "verde", "blu"];
const primari_sottrattivi = ["ciano", "magenta", "giallo"];

console.log("rosso", "verde", "blu");
//rosso verde blu
console.log(...primari_additivi);
//rosso verde blu

//SPREAD OPERATOR ...
const tutti_primari = [...primari_additivi, ...primari_sottrattivi];
//è come fare ["rosso", "verde", "blu"  , "ciano", "magenta", "giallo"]
//spalma i primi e poi spalma i secondi, prende ciascun valore singolarmente
//non sono più in un array
console.log("rosso", "verde", "blu", "ciano", "magenta", "giallo");
//rosso verde blu ciano magenta giallo
console.log(tutti_primari);
//[ 'rosso', 'verde', 'blu', 'ciano', 'magenta', 'giallo' ]

const primari_additivi_rosa = [...primari_additivi, "rosa"];
console.log(primari_additivi_rosa);
//[ 'rosso', 'verde', 'blu', 'rosa' ]

const nuovo = "arancione";
const primari_additivi_rosa_arancione = [...primari_additivi, "rosa", nuovo];
console.log(primari_additivi_rosa_arancione);
//[ 'rosso', 'verde', 'blu', 'rosa', 'arancione' ]

const persona = {
  nome: "Peach",
  cognome: "Princess",
};

const persona2 = {
  ...persona,
  ...{ voti: [6, 7, 9] }, //spalmo oggetto voti
};

persona2.indirizzo = "Via Roma 42";

console.log(persona);
//{ nome: 'Peach', cognome: 'Princess' }
console.log(persona2);
/*
{
  nome: 'Peach',
  cognome: 'Princess',
  voti: [ 6, 7, 9 ],
  indirizzo: 'Via Roma 42'
}
*/
