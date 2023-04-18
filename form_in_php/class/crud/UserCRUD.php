<?php
namespace crud;

use models\User;
use PDO;

//CRUD = CREATE, READ, UPDATE, DELETE
class UserCRUD{

    //create -> POST✅
    public function create(User $user)
    {
        $query = "INSERT INTO user (first_name, last_name, birthday, birth_city, id_regione, id_provincia, gender, username, password)
                    VALUES (:first_name, :last_name, :birthday, :birth_city, :id_regione, :id_provincia, :gender, :username, :password)";
                    //parametri indicati con i :
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':first_name', $user -> first_name, \PDO::PARAM_STR);//tipo di dato che mi aspetto di trovare nel parametro
        $stm -> bindValue(':last_name', $user -> last_name, \PDO::PARAM_STR);
        $stm -> bindValue(':birthday', $user -> birthday, \PDO::PARAM_STR);
        $stm -> bindValue(':birth_city', $user -> birth_city, \PDO::PARAM_STR);
        $stm -> bindValue(':id_regione', $user -> id_regione, \PDO::PARAM_INT);
        $stm -> bindValue(':id_provincia', $user -> id_provincia, \PDO::PARAM_INT);
        $stm -> bindValue(':gender', $user -> gender, \PDO::PARAM_STR);
        $stm -> bindValue(':username', $user -> username, \PDO::PARAM_STR);
        $stm -> bindValue(':password', md5($user -> password), \PDO::PARAM_STR);
        $stm -> execute();
        // per conoscere id dell' oggetto inserito
        return $conn -> lastInsertId();

    }

    //update -> PUT✅
    public function update($user, $user_id)
    {
        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);

        $query = "UPDATE `user` SET  `first_name`= :first_name, `last_name`= 
        :last_name, `birthday` = :birthday, `birth_city`= :birth_city, `id_regione`= 
        :id_regione, `id_provincia`=:id_provincia, 
        -- `username`=:username, `password`=:password,
        `gender`=:gender WHERE user_id= :user_id;";

        $stm = $conn -> prepare($query);
        $stm -> bindValue(':first_name', $user -> first_name, \PDO::PARAM_STR);
        $stm -> bindValue(':last_name', $user -> last_name, \PDO::PARAM_STR);
        $stm -> bindValue(':birthday', $user -> birthday, \PDO::PARAM_STR);
        $stm -> bindValue(':birth_city', $user -> birth_city, \PDO::PARAM_STR);
        $stm -> bindValue(':id_regione', $user -> id_regione, \PDO::PARAM_INT);
        $stm -> bindValue(':id_provincia', $user -> id_provincia, \PDO::PARAM_INT);
        $stm -> bindValue(':gender', $user -> gender, \PDO::PARAM_STR);
        $stm->bindValue(':user_id', $user_id, \PDO::PARAM_INT);
        $stm -> execute();

        return $stm->rowCount();
    }

        // $query = "UPDATE `user` SET  `first_name`= :first_name, `last_name`= 
        // :last_name, `birthday` = :birthday, `birth_city`= :birth_city, `regione_id`= 
        // :regione_id, `provincia_id`=:provincia_id, `gender`=:gender WHERE user_id= :user_id;";


    //read_by_user_id -> GET✅
    public function read_by_user_id(int $user_id = null):User|array|bool
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "SELECT * FROM user WHERE user_id = :user_id";
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':user_id', $user_id, PDO::PARAM_INT);
            
        $stm -> execute();//va sempre prima del $result
        $result = $stm -> fetchAll(PDO::FETCH_CLASS, User::class);
        
        return $result;
    }

    //read_all -> GET✅
    public function read_all()
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "SELECT * FROM user";
        $stm = $conn -> prepare($query);
            
        $stm -> execute();//va sempre prima del $result
        $result = $stm -> fetchAll(PDO::FETCH_CLASS, User::class);
                
        if(count($result) === 0){
            return false;
        }
        return $result;
    }

    //delete -> DELETE✅
    public function delete($user_id)
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $query = "DELETE FROM user WHERE user_id = :user_id";
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':user_id', $user_id, PDO::PARAM_INT);//mi aspetto un intero
        $stm -> execute();
        //non c'è fetchAll() perchè non abbiamo un risultato
        return $stm -> rowCount();
    }
}

?>