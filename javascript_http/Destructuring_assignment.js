//VERSIONE 1
const task = {
  name: "comprare la colomba Tre Marie",
  due_date: "2023-04-08",
  done: true,
};

const frase1 = `Ti ricordi che il ${task.due_date} sei andata a ${task.name}?`;

console.log(frase1);
//Ti ricordi che il 2023-04-08 sei andata a comprare la colomba Tre Marie?

//VERSIONE 2
//const { name, due_date } = task;

//VERIONE 3
frase(task);

function frase({ name, due_date }) {
  const frase2 = `Ti ricordi che il ${due_date} sei andata a ${name}?`;
  console.log(frase2);
}
//Ti ricordi che il 2023-04-08 sei andata a comprare la colomba Tre Marie?
