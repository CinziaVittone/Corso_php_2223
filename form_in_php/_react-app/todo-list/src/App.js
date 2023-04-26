//import { useState } from "react";
//importato anche il percorso
import TaskItem from "./components/TaskItem/TaskItem";
//importo il css
import "./App.css";
import TaskList from "./components/TaskList/TaskList";
import SearchBar from "./components/SearchBar";

function App() {
  //array con formato che mi aspetto, SONO DATI
  //lo recupero da thunder Get read_all

  const taskListData = [
    {
      user_id: 28,
      name: "Comprare il cioccolato 🍫",
      due_date: "2023-04-15",
      done: true,
      task_id: 25,
    },
    {
      user_id: 5,
      name: "Comprare le caramelle 🍬",
      due_date: "2023-09-07",
      done: false,
      task_id: 26,
    },
  ];

  //variabile che è l'elenco delle cose da fare, stato iniziale vuoto
  //const [taskListData, setTaskListData] = useState([]);

  /*  function addTask() {
    //funzione di callback che passa lo stato attuale
    //metodo con cui verranno aggiunte le tasks
    setTaskListData((attuale) => {
      //nuovo array è copia dello stato attuale con lo SPREAD OPERATOR
      const new_attuale = [...attuale];
      //aggiungo
      new_attuale.push({
        user_id: 28,
        name: "Comprare il cioccolato 🍫",
        due_date: "2023-04-15",
        done: true,
        task_id: 25,
      });
      //devo restituire qualcosa
      //lo scopo di useState è cambiare lo stato
      return new_attuale;
    });
  }
  */

  //il map() è il metodo di trasformazione di un array per eccellenza
  //stavolta il name lo prendo dalle proprietà del dato task nell' array, quindi task.name
  //OPERATORE DI DESTRUTTURAZIONE recupera il name dal dato task

  //task_id è la mia unique key
  const list = taskListData.map((task) => (
    <TaskItem
      key={task.task_id}
      nameTask={task.name}
      done={task.done}
    ></TaskItem>
  ));

  //essendo coponenti posso ripeterli ogni volta che ho bisogno
  return (
    <main>
      <SearchBar></SearchBar>
      {/* <TaskItem nameTask={"Andare allo Zoom 🦛"}></TaskItem> */}
      {/* adesso restituisco direttamente la lista */}
      {/* {list} */}
      {/* qua c'è il children, contenuto */}
      <div>{/* <button onClick={addTask}>Add Task</button> */}</div>
      <TaskList header={"👤 Employee 1 - tasks to do: "} tasks={taskListData}>
        {list}
      </TaskList>
      <TaskList header={"👤 Employee 2 - tasks to do: "} tasks={taskListData}>
        {list}
      </TaskList>
    </main>
  );
}

export default App;
