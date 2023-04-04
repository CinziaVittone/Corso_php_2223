<?php
// ../esco da rest_api ../esco da form_in_php , sono fuori a tutto e trovo config

use crud\UserCRUD;
use models\User;

include "../../config.php";
include "../autoload.php";

$crud = new UserCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    #----------GET
    case 'GET':
        $user_id = filter_input(INPUT_GET, 'user_id');
        if(!is_null($user_id)){
           echo json_encode($crud -> read($user_id));
        }else{//user_id è null
            $users = $crud -> read();
            echo json_encode($users);
        }
        break;
        # Model
        // ottenere elenco utenti, con read del CRUD
        //$users = $crud -> read();
        //gli users sono un array, vogliamo trasformali in json, è una stringa
        //echo json_encode($users);

    #----------DELETE
    case 'DELETE':
        $user_id = filter_input(INPUT_GET, 'user_id');
        if(!is_null($user_id)){
            $rows = $crud -> delete($user_id);
            if($rows ==1){
                http_response_code(204);
            }
            if($rows == 0){
                http_response_code(404);
                // array associativo
                $response = [
                    // proprietà errors
                    // 'chiave' => "valore"
                    'errors' => [
                        [
                        'status' => 404,
                        'title' => "utente_id non trovato",
                        'details' => $user_id 
                        ]    
                    ]
                ];
            }
            //risposta va convertita in formato json
            echo json_encode($response);     
        }  
        break;

    #----------POST
    case 'POST':
        $input = file_get_contents('php://input');
        // ottengo un array associativo
        $request = json_decode($input, true);

        $user = User::array_to_user($request);

        $last_insert_id = $crud -> create($user);

        /*
        $response = [
            // array associativo
            'data' => [
                'type' => "users",
                'id' => "last_insert_id",
                'attributes' => $user   
            ]
        ];
        */

        // cast, lo converto in un array
        $user = (array)$user;
        // unset()annulla gli indici di un array, non restituisco queste parti
        unset($user['password']);
        $user['user_id'] = $last_insert_id;
        $response = [
            'data' => $user,
            'status' => 202
        ];
        echo json_encode($response);
        break;

    #----------PUT
    case 'PUT':
        $user_id = filter_input(INPUT_GET, 'user_id');

        $input = file_get_contents('php://input');
        $request = json_decode($input, true);

        $user = User::array_to_user($request);

        $last_insert_id = $crud->update($user, $user_id);

        $user = (array)$user;
        unset($user['username']);
        unset($user['password']);
        $user['user_id'] = $last_insert_id;
        
            if ($last_insert_id == 1) {
                $response = [
                    'data' => $user,
                    'status' => 202
                ];
            }
            if ($last_insert_id == 0) {
                http_response_code(404);
                // array associativo
                $response = [
                    // proprietà errors
                    // 'chiave' => "valore"
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "utente_id non trovato",
                            'details' => $user_id
                        ]
                    ]
                ];
            }
            //risposta va convertita in formato json
            echo json_encode($response);
        break;
}


?>