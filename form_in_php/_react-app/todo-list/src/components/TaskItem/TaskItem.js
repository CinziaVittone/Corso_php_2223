import { useState } from "react";
import { Button } from "react-bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import { updateTask } from "../../service/TodoService";
//arrow function che passa delle props
//se ho delle classi nel layout devono diventare className
//devo chiudere il tag input, i tag vanno sempre chiusi, aggiungo / alla fine
//prima era (props) adesso uso destrutturazione, quindi ({nameTask, done})
//accedo direttamente agli attributi
function TaskItem({ nameTask, done, task_id, parentRemoveTask }) {
  const [doneCheckbox, setDoneCheckbox] = useState(done);

  function onRemoveTask() {
    console.log("task" + task_id);
    parentRemoveTask(task_id);
  }

  //stato da done true a false e viceversa
  function onUpdateStatus(evento) {
    setDoneCheckbox(evento.target.checked);
  }

  //UPDATE TASK

  return (
    <li className={done ? "Task già completata" : ""}>
      {doneCheckbox ? <h1>DONE</h1> : <h1>TO DO</h1>}
      <input
        onChange={(evento) => onUpdateStatus(evento)}
        checked={doneCheckbox}
        type="checkbox"
        className="form-check-input"
        id="flexCheck"
      />
      {done}
      <label>{nameTask}</label>
      <Button variant="secondary" onClick="{onUpdateTask}">
        ✏️
      </Button>
      <Button variant="danger" onClick={onRemoveTask}>
        ✖️
      </Button>
    </li>
  );
}
export default TaskItem;
