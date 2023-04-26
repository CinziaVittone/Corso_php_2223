//arrow function che passa delle props
//se ho delle classi nel layout devono diventare className
//devo chiudere il tag input, i tag vanno sempre chiusi, aggiungo / alla fine
//prima era (props) adesso uso destrutturazione, quindi ({nameTask, done})
//accedo direttamente agli attributi
const TaskItem = ({ nameTask, done }) => {
  return (
    <li className="list-group-item">
      <input
        className="form-check-input"
        type="checkbox"
        value=""
        id="flexCheck"
        checked={done}
      />
      {done}
      <label>{nameTask}</label>
      <button className="btn btn-danger">
        <i className="fa fa-times"></i>
      </button>
    </li>
  );
};

export default TaskItem;
