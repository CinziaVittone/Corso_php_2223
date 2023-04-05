<?php
namespace crud;

use models\Task;
use PDO;

//CRUD = CREATE, READ, UPDATE, DELETE
class TaskCRUD{
    
    public function create(Task $task)
    {
        $query = "INSERT INTO task (user_id, name, due_date, done)
        VALUES (:user_id, :name, :due_date, :done)";
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':user_id', $task -> user_id, \PDO::PARAM_INT);
        $stm -> bindValue(':name', $task -> name, \PDO::PARAM_STR);
        $stm -> bindValue(':due_date', $task -> due_date, \PDO::PARAM_STR);
        $stm -> bindValue(':done', $task -> done, \PDO::PARAM_BOOL);
        $stm -> execute();
        
        return $conn -> lastInsertId();
    }
    
    public function update($task, $task_id){
        $query = "UPDATE 'task' SET 'user_id'=:user_id, 'name'=:name,
        'due_date':due_date, 'done':done;";
        
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':user_id', $task -> user_id, \PDO::PARAM_INT);
        $stm -> bindValue(':name', $task -> name, \PDO::PARAM_STR);
        $stm -> bindValue(':due_date', $task -> due_date, \PDO::PARAM_STR);
        $stm -> bindValue(':done', $task -> done, \PDO::PARAM_BOOL);
        $stm -> execute();
        return $stm->rowCount();
    }
    
    public function read(int $task_id = null):Task|array|bool
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "SELECT * FROM task WHERE task_id = :task_id";
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':task_id', $task_id, PDO::PARAM_INT);
        
        $stm -> execute();//va sempre prima del $result
        $result = $stm -> fetchAll(PDO::FETCH_CLASS, Task::class);
        
        if(count($result)==1){
            return $result[0];
        }
        if(count($result)>1){
            throw new \Exception("Chiave primaria duplicata", 1);
        }
        if(count($result)===0){
            return false;
        }else{
            $query = "SELECT * FROM user";
            $stm = $conn -> prepare($query);
            $stm -> execute();
            $result = $stm -> fetchAll(PDO::FETCH_CLASS, Task::class);//ho una classe che rappresenta l' utente
            
            if(count($result) === 0){
                return false;
            }
            return $result;
        }
    }
    
    public function delete($task_id)
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "DELETE FROM task WHERE task_id = :task_id";
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':task_id', $task_id, PDO::PARAM_INT);//mi aspetto un intero
        $stm -> execute();
        //non c'è fetchAll() perchè non abbiamo un risultato
        return $stm -> rowCount();
    }
}

?>