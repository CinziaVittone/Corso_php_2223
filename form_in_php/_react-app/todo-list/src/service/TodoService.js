//FUNCTION EXPRESSION
//ogni funzione va resa disponibile all' esterno del modulo

//GESTIONE APPLICAZIONE, MANIPOLAZIONE DEI DATI:

//NEW TASK
export const addTask = (newTask, todos) => {
  if (newTask.name === undefined || newTask.name.trim() === "") {
    throw new Error("Manca il nome alla task");
  }
  //TUTTE OPERAZIONI SULLE COPIE, ORIGINALE IMMUTATO, IMMUTABILITÀ
  //non funziona se non facciamo la copia xl in js variabili passate per RIFERIMENTO
  //errori xk una variabile magari modificata dentro una funzione e la uso senza accorgermene
  //1.fai una copia dell' originale e creo un array con un costruttore new Array()
  //...todos equivale a mettere letteralmente tutto l 'array dentro
  const todosCopy = new Array(...todos); //SHALLOW COPY
  //const newTaskCopy = { ...newTask };
  //Versione con il name
  const newTaskCopy = { ...newTask, ...{ name: newTask.name.trim() } }; // {3,4,6,7}
  //2.modifica la copia, originale immutabile, todos.push(newTask) NON VA BENE;
  newTaskCopy.task_id = new Date().getTime(); //per generare id
  //oggetto Date crea l’ istanza del giorno di oggi, lo usiamo per task_id
  //metodo .getTime() restituisce la data di oggi in millisecondi
  //.getMonth() restituisce il mese partendo da posizione 0(Gennaio)
  todosCopy.push(newTaskCopy);
  //.push() aggiunge all' array e restituisce la nuova length
  //3.restituisci copia modificata
  return todosCopy;
};
//LET e CONST vivono solo dentro le graffe, il loro scope è nelle graffe

//REMOVE TASK
export const removeTask = (task_id, todos) => {
  //copiamo array
  const todosCopy = new Array(...todos);
  //altra tecnica di shallow copy const todosCopy = todos.slice();
  //ricerca sulla copia, se il task_id della task è uguale al task_id che cerco
  const indexToRemove = todosCopy.findIndex((task) => task.task_id == task_id);
  todosCopy.splice(indexToRemove, 1); //quello che trovo più una casella
  console.log(indexToRemove); //se non lo trova restituisce -1
  return todosCopy;
};

//UPDATE TASK
export const updateTask = (taskToUpdate, todos) => {
  const todosCopy = new Array(...todos);
  return todosCopy.map((task) => {
    if (task.task_id === taskToUpdate.task_id) {
      return { ...task, ...taskToUpdate }; //merge
    }
    return task;
  });
};

//FILTRI:

//ACTIVE TASK
export const activeFilter = (todos) => {
  //risultato della ricerca
  //metodo .filter(callback)
  //.filter() fa già una copia, non serve clonare l' originale
  return todos.filter((task) => !task.done);
}; //le tasks ACTIVE avranno il done=false

//COMPLETED TASK
export const completedFilter = (todos) => todos.filter((task) => task.done); //le tasks COMPLETED avranno il done=false

//DATE TASK
export const dateFilter = (todayDate, todos) => {
  return todos.filter((task) => task.due_date === todayDate);
}; //le tasks TODAY
