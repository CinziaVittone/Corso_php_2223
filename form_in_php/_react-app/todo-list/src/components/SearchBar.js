import { useState } from "react";

const SearchBar = () => {
  //valore iniziale del mio campo di input(nome della task, taskName) è una stringa, vuota
  //const[valore che prende get, funzione set]
  const [taskName, setTaskName] = useState(""); //Nome della task
  const [taskDueDate, setTaskDueDate] = useState(""); //Data di scadenza

  //VERSIONE1
  /*
  function quandoCambiaIlValoreFaiQuesto(evento) {
    console.log("qui :)", evento.target.value);
    setTaskName(evento.target.value);
  }
  */

  return (
    <form className="task-form mt-3 mb-3">
      <pre>
        {taskName}
        {taskDueDate}
      </pre>
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
          onChange={(evento) => setTaskName(evento.target.value)}
          className="form-control"
        />
        <button name="add-task" className="btn btn-primary ms-3">
          <i className="fa fa-plus"></i>
        </button>
      </div>

      <label htmlFor="due_date" className="form-label">
        Data di scadenza
      </label>

      <div>
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
    </form>
  );
};

export default SearchBar;
