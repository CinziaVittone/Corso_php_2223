//FUNCTION EXPRESSION: funzione(arrow function) dentro una variabile
//qua uso (props), quindi per accedere ai valori props.
const TaskList = (props) => {
  return (
    //FRAGMENT
    <>
      <label className="task_list__header">
        {props.header}
        {props.tasks.length}
      </label>
      <ul className="task_list__list">{props.children}</ul>
    </>
  );
};

//da fare sempre ESPORTAZIONE DI DEFAULT
export default TaskList;
