//arow function che passa delle props
const TaskItem = (props) => {
  return (
    <li className="list-group-item">
      <input
        className="form-check-input"
        type="checkbox"
        value=""
        id="flexCheck"
      />
      TaskItem
      <button className="btn btn-danger">
        <i className="fa fa-times"></i>
      </button>
    </li>
  );
};

export default TaskItem;
