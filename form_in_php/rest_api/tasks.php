<?php

use crud\TaskCRUD;
use models\Task;

require "../../config.php";
require "../autoload.php";

$crud = new TaskCRUD();

switch ($_SERVER['REQUEST_METHOD']) {
    #----------GET
    case 'GET':
        $task_id = filter_input(INPUT_GET, 'task_id');
        if(!is_null($task_id)){
            echo json_encode($crud -> read($task_id));
         }else{//task_id è null
             $users = $crud -> read();
             echo json_encode($users);
         }
         break;

    #----------DELETE
    case 'DELETE':
        $task_id = filter_input(INPUT_GET, 'task_id');
        if(!is_null($task_id)){
            $rows = $crud -> delete($task_id);
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
                        'title' => "task_id non trovato",
                        'details' => $task_id 
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

        $user = Task::array_to_task($request);

        $last_insert_id = $crud -> create($task);

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
        $task = (array)$task;
        // unset()annulla gli indici di un array, non restituisco queste parti
        unset($task['password']);
        $task['task_id'] = $last_insert_id;
        $response = [
            'data' => $task,
            'status' => 202
        ];
        echo json_encode($response);
        break;


    #----------PUT
    case 'PUT':
        $task_id = filter_input(INPUT_GET, 'task_id');

        $input = file_get_contents('php://input');
        $request = json_decode($input, true);

        $user = Task::array_to_task($request);

        $last_insert_id = $crud->update($user, $task_id);

        $user = (array)$user;
        unset($user['username']);
        unset($user['password']);
        $user['task_id'] = $last_insert_id;
        
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
                            'details' => $task_id
                        ]
                    ]
                ];
            }
            //risposta va convertita in formato json
            echo json_encode($response);
        break;
}


?>