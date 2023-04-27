//aggiungere .js
import {
  activeFilter,
  addTask,
  completedFilter,
  dateFilter,
  removeTask,
  updateTask,
} from "./TodoService.js";

const taskList = [
  {
    user_id: 10,
    task_id: 1,
    name: "Andare allo Zoom🦛",
    due_date: "2023-05-01",
    done: false,
  },
  {
    user_id: 20,
    task_id: 2,
    name: "Giornata di relax🏡",
    due_date: "2023-04-25",
    done: true,
  },
  {
    user_id: 20,
    task_id: 3,
    name: "Lezione alle 8:30⏰",
    due_date: "2023-04-22",
    done: true,
  },
];

//suggerisce e importa da solo grazie a EXPORT

//ACTIVE TASK LIST

const activeTaskList = activeFilter(taskList);
console.log(activeTaskList);

if (!(activeTaskList.length == 1)) {
  console.log("Test ACTIVE TASK fallito");
}
//se ne ho 1 sola true stampa le 2 false +  Test fallito
//perchè c'è più di una task tra le attive(done:false)
//se ne ho più di una true allora stampa l' unica false, passo il test

//COMPLETED TASK LIST
const completedTaskList = completedFilter(taskList);
console.log(completedTaskList);

if (!(completedTaskList.length == 2)) {
  console.log("Test COMPLETED TASK fallito");
}

//NEW TASK LIST
const newTask = {
  user_id: 10,
  //task_id AUTO INCREMENTANTE
  name: "Compleanno nonna🎂",
  due_date: "2023-04-18",
  done: true,
};
//aggiunge newTask alla lista iniziale taskList
const newTaskList = addTask(newTask, taskList);
console.log(newTaskList);

if (!(newTaskList.length == 4)) {
  console.log("Test NEW TASK fallito");
}
//se non risultano 4 tasks è fallito perchè non ha aggiunto

//--NO NAME
const newTaskNoName = {
  user_id: 12,
  due_date: "2000-03-01",
};

try {
  const addTaskNoName = addTask(newTaskNoName, taskList);
  console.log("Test NOME VUOTO fallito");
} catch (error) {
  if (!(error.message === "Manca il nome alla task")) {
    console.log("Test fallito, non ho trovato l'errore che mi aspettavo");
  }
  // console.log(error.message)
}

//--EMPTY STRING NAME
const emptyStringName = {
  name: "",
  user_id: 12,
  due_date: "2000-03-01",
};

try {
  const addTaskNoName = addTask(emptyStringName, taskList);
  console.log("Test STRINGA VUOTA fallito");
} catch (error) {
  if (!(error.message === "Manca il nome alla task")) {
    console.log("Test fallito, non ho trovato l'errore che mi aspettavo");
  }
}

//--SPACE STRING NAME
const spaceStringName = {
  name: "          ",
  user_id: 12,
  due_date: "2000-03-01",
};

try {
  const addTaskNoName = addTask(spaceStringName, taskList);
  console.log("Test SPAZI VUOTI fallito");
} catch (error) {
  if (!(error.message === "Manca il nome alla task")) {
    console.log("Test fallito, non ho trovato l'errore che mi aspettavo");
  }
}

//--TO TRIM TASK
const toTrimTask = {
  name: "   Rinnovare patente       ",
  user_id: 12,
  due_date: "2000-03-01",
};

const addToTrimTask = addTask(toTrimTask, taskList);
//console.log("addTaskNoName Test SPAZI VUOTI fallito");

const res = addToTrimTask.find(function (task, index) {
  return task.name == toTrimTask.name.trim();
});

if (res == undefined) {
  console.log("Test fallito per addToTrimTask");
}
//console.log(addTaskNoName);

//REMOVED TASK LIST
const task_id = 3; //si trova alla posizione 2
//const removedTaskList = removeTask(task_id, newTaskList); //così coinvolgo anche la task nuova
const removedTaskList = removeTask(task_id, taskList); //così lavoro sulla lista iniziale
console.log(removedTaskList);

//UPDATED TASK LIST
const updatedTask = {
  task_id: 1, //task_id che voglio modificare
  name: "Andare al cinema🎥",
};
const updatedTaskList = updateTask(updatedTask, taskList);
console.log(updatedTaskList);

//DATE TASK LIST
const todayDate = "2023-04-25";
const todayTaskList = dateFilter(todayDate, taskList);
console.log(todayTaskList);
