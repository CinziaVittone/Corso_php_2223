//import { useState } from "react";
//importato anche il percorso
import TaskItem from "./components/TaskItem/TaskItem";
//importo il css
import "./App.css";
import TaskList from "./components/TaskList/TaskList";
import SearchBar from "./components/SearchBar";
import { useState } from "react";
import {
  activeFilter,
  addTask,
  completedFilter,
  dateFilter,
  removeTask,
  updateTask,
} from "./service/TodoService";
import { Button } from "react-bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";

function App() {
  //array con formato che mi aspetto, SONO DATI
  //lo recupero da thunder Get read_all

  /*
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
  */

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
  /*
  const list = taskListData.map((task) => (
    <TaskItem
      key={task.task_id}
      nameTask={task.name}
      done={task.done}
    ></TaskItem>
  ));
  */

  //LEZIONE DI OGGI
  //inizio con una lista vuota
  //const[operatore di destrutturazione]
  const [taskListData, setTaskListData] = useState([
    //se metto le task di defualt fatta non fatta ecc così vedo il funzionamento dei filtri
    //se non riesco a fare il checked io lo imposto di default
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
  ]);

  const [filtredTask, setFiltredTask] = useState([taskListData]);

  //ADD TASK
  function parentAddTask(newTask) {
    //alert("Hello🦭" + newTask.name);
    const newTaskListData = addTask(newTask, taskListData);
    setTaskListData(newTaskListData); //aggiorna l' interfaccia confrontando con lo stato appena messo
  }

  //REMOVE TASK
  function parentRemoveTask(task_id) {
    console.log("parentRemoveTask" + task_id);
    const res = removeTask(task_id, taskListData);
    setTaskListData(res); //aggiorna l' interfaccia confrontando con lo stato appena messo
  }

  // //UPDATE TASK
  // function parentUpdateTask(task_id) {
  //   console.log("parentUpdateTask" + task_id);
  //   const res = updateTask(task_id, taskListData);
  //   setTaskListData(res);
  // }

  //COMPLETED TASK
  function onShowCompleted() {
    //uso il servizio che mostra le task complete
    const res = completedFilter(taskListData);
    setTaskListData(res);
  }

  //ALL TASK
  function onShowAll() {
    setTaskListData(taskListData);
  }

  //ACTIVE TASK
  function onShowActive() {
    const res = activeFilter(taskListData);
    setTaskListData(res);
  }

  //TODAY TASK
  function onShowDate() {
    const res = dateFilter("2023-04-25", taskListData);
    setTaskListData(res);
  }

  //essendo componenti posso ripeterli ogni volta che ho bisogno
  return (
    <main>
      <SearchBar parentAddTask={parentAddTask}></SearchBar>

      <Button variant="warning" onClick={onShowAll}>
        ALL
      </Button>
      <Button variant="danger" onClick={onShowActive}>
        ACTIVE
      </Button>
      <Button variant="success" onClick={onShowCompleted}>
        COMPLETED
      </Button>
      <Button variant="info" onClick={onShowDate}>
        TODAY
      </Button>

      {/* <TaskItem nameTask={"Andare allo Zoom 🦛"}></TaskItem> */}
      {/* adesso restituisco direttamente la lista */}
      {/* {list} */}
      {/* qua c'è il children, contenuto */}
      <div>{/* <button onClick={addTask}>Add Task</button> */}</div>
      <TaskList header={"👤 Employee 1 - tasks to do: "} tasks={taskListData}>
        {/* {list} */}
        {taskListData.map((task) => (
          <TaskItem
            key={task.task_id}
            parentRemoveTask={parentRemoveTask}
            task_id={task.task_id}
            done={task.done}
            nameTask={task.name}
          />
        ))}
      </TaskList>
    </main>
  );
}

export default App;
