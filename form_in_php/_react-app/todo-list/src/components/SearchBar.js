//Named export
import { useState } from "react";
import { Button } from "react-bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import Form from "react-bootstrap/Form";
import InputGroup from "react-bootstrap/InputGroup";

const SearchBar = (props) => {
  //Hook useState
  //valore iniziale del mio campo di input(nome della task, taskName) è una stringa, vuota
  //const[valore che prende get, funzione set]
  //[Operatore di destrutturazione]
  //taskName è analogo a un GET
  //setTaskName è analogo a un SET
  const [taskName, setTaskName] = useState(""); //Nome della task
  const [taskDueDate, setTaskDueDate] = useState(""); //Data di scadenza

  //LEZIONE DI OGGI
  function onAddTask() {
    const newTask = {
      //trim() method removes whitespace from both ends of a string
      //returns a new string, without modifying the original string
      name: taskName.trim(),
      due_date: taskDueDate,
      done: false,
    };
    console.log(newTask);
    props.parentAddTask(newTask);
    setTaskName("");
  }

  function onUpdateTask(){
    
  }
  //VERSIONE1
  /*
  function quandoCambiaIlValoreFaiQuesto(evento) {
    console.log("qui :)", evento.target.value);
    setTaskName(evento.target.value);
  }
  */

  //tutti i campi di input hanno un evento onChange che si scatena ogni volta che cambio qualcosa, anche solo scrivendo una lettera
  return (
    <div className="task-form mt-3 mb-3">
      {/* preview in diretta di cosa scrivo */}
      {/* <pre>
        {taskName}
        {taskDueDate}
      </pre> */}
      <div className="task-add">
        <input
          type="text"
          id="task"
          name="task"
          //value="Aggiungi nuova task/ricerca"
          value={taskName}
          //gestore dell' evento è sempre una funzione
          //VERSIONE1
          //onChange={quandoCambiaIlValoreFaiQuesto}
          //VERSIONE2
          //evento.target.value è la versione più aggiornata
          //FUNZIONE ANONIMA comunica il cambiamento
          onChange={(evento) => setTaskName(evento.target.value)}
          className="form-control"
        />

        <Button
          variant="primary"
          type="submit" //imposto il type
          name="add-task"
          className="btn btn-primary ms-3"
          value="add"
          onClick={onAddTask} //azione del bottone legata alla funzione
          disabled={!taskName.trim().length > 0} //quando il campo di testo è vuoto, è disabilitato così non aggiunge il vuoto
        >
          ➕
        </Button>
      </div>
      <div>
        {/* messaggio per l' utente */}
        {!taskName.trim().length > 0 ? "Devi inserire una task" : ""}
      </div>

      <Form.Label htmlFor="due_date" className="form-label">
        Data di scadenza
      </Form.Label>

      <input
        type="date"
        value={taskDueDate}
        //evento.target.value è la versione più aggiornata
        onChange={(evento) => setTaskDueDate(evento.target.value)}
        className="form-control date-picker"
        name="due_date"
        id="due_date"
      />

    </div>
  );
};

export default SearchBar;
