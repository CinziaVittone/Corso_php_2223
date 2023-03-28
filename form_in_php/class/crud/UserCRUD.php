<?php
namespace crud;

use Exception;
use models\User;
use PDO;

//CRUD = CREATE, READ, UPDATE, DELETE
class UserCRUD{

    public function create(User $user)
    {
        $query = "INSERT INTO user (first_name, last_name, birthday, birth_city, id_regione, provincia_id, gender, username, password)
                    VALUES (:first_name, :last_name, :birthday, :birth_city, :id_regione, :provincia_id, :gender, :username, :password)";
                    //parametri indicati con i :
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':first_name', $user -> first_name, \PDO::PARAM_STR);//tipo di dato che mi aspetto di trovare nel parametro
        $stm -> bindValue(':last_name', $user -> last_name, \PDO::PARAM_STR);
        $stm -> bindValue(':birthday', $user -> birthday, \PDO::PARAM_STR);
        $stm -> bindValue(':birth_city', $user -> birth_city, \PDO::PARAM_STR);
        $stm -> bindValue(':id_regione', $user -> id_regione, \PDO::PARAM_INT);
        $stm -> bindValue(':provincia_id', $user -> provincia_id, \PDO::PARAM_INT);
        $stm -> bindValue(':gender', $user -> gender, \PDO::PARAM_STR);
        $stm -> bindValue(':username', $user -> username, \PDO::PARAM_STR);
        $stm -> bindValue(':password', md5($user -> password), \PDO::PARAM_STR);
        $stm -> execute();
    }

    public function update(User $user)
    {
        echo "Sono dentro UPDATE";
        $query = "UPDATE table_name
        SET first_name = :first_name, 
            last_name =  :last_name,
            birthday =  :birthday,
            birth_city =  :birth_city,
            id_regione =  :id_regione,
            provincia_id =  :provincia_id
        WHERE  where user_id = :user_id;";

        $conn = new \PDO(DB_DSN,DB_USER,DB_PASSWORD);
        $stm = $conn -> prepare($query);
        $stm -> bindValue(':first_name', $user -> first_name, \PDO::PARAM_STR);
        $stm -> bindValue(':last_name', $user -> last_name, \PDO::PARAM_STR);
        $stm -> bindValue(':birthday', $user -> birthday, \PDO::PARAM_STR);
        $stm -> bindValue(':birth_city', $user -> birth_city, \PDO::PARAM_STR);
        $stm -> bindValue(':id_regione', $user -> id_regione, \PDO::PARAM_INT);
        $stm -> bindValue(':provincia_id', $user -> provincia_id, \PDO::PARAM_INT);
        $stm -> bindValue(':gender', $user -> gender, \PDO::PARAM_STR);
        //$stm->bindValue(':id_user', $user->id_user, \PDO::PARAM_INT);
        $stm -> execute();
        return $stm->rowCount();
    }

    public function read(int $user_id = null):User|array|bool
    {
        $conn = new \PDO(DB_DSN, DB_USER, DB_PASSWORD);
        if(!is_null($user_id)){
            $query = "SELECT * FROM user WHERE user_id = :user_id";
            $stm = $conn -> prepare($query);
            $stm -> bindValue(':user_id', $user_id, PDO::PARAM_INT);//mi aspetto un intero

            $stm -> execute();//va sempre prima del $result
            $result = $stm -> fetchAll(PDO::FETCH_CLASS, User::class);

            if(count($result)==1){
                return $result[0];
            }
            if(count($result)>1){
                throw new \Exception("Chiave primaria duplicata", 1);
            }
            if(count($result)===0){
                return false;
            }
        }else{
            $query = "SELECT * FROM user";
            $stm = $conn -> prepare($query);
            $stm -> execute();
            $result = $stm -> fetchAll(PDO::FETCH_CLASS, User::class);//ho una classe che rappresenta l' utente
            if(count($result) === 0){
                return false;
            }
            return $result;
        }
    }

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