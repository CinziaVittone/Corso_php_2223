<?php

use crud\TaskCRUD;
use models\Task;

require "../../config.php";
require "../autoload.php";

$crud = new TaskCRUD();
/*
    switch(i) {
  case 1:  {code block A; break;}
  case 2:  {code block b; break;}
  case 3:  {code block A; break;}
  default: {code block default; break;}
}
*/
switch ($_SERVER['REQUEST_METHOD']) {
    #----------GET read_all, read_by_task_id, read_by_user_id✅
    case 'GET':
        $task_id = filter_input(INPUT_GET,'task_id');
        $user_id = filter_input(INPUT_GET,'user_id');
        //task_id
        if(!is_null($task_id)){
            $tasks = $crud->read_by_task_id($task_id);
            if($tasks == false){
                    $response = [
                        'errors' => [
                            [
                                'status' => 404,
                                'title' => "Risorsa non trovata, task_id non esistente",
                                'details' => $task_id
                            ]
                        ]    
                    ];  
                    echo json_encode($response);
            }else{
                http_response_code(200);

                $response = [
                    'data' => $tasks,
                    'status' => 200
                ];
                echo json_encode($response);
            }
        //user_id
        }elseif(!is_null($user_id)){
            $tasks = $crud->read_by_user_id($user_id);
            if($tasks == false){
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Risorsa non trovata, user_id non esistente",
                            'details' => $user_id
                        ]
                    ]    
                    ];
                echo json_encode($response);
            }else{
                http_response_code(200);

                $response = [
                    'data' => $tasks,
                    'status' => 200
                ];
                echo json_encode($response);
            }
        //all
        }else{
            $tasks = $crud->read_all();

            $response = [
                'data' => $tasks,
                'status'=>200
            ]; 
            echo json_encode($response);
        }
        break;

    #----------DELETE delete✅
    case 'DELETE':
        $task_id = filter_input(INPUT_GET, 'task_id');

        $input = file_get_contents('php://input');
        
        $last_insert_id = $crud->delete($task_id);

        $task['task_id'] = $last_insert_id;

        if ($last_insert_id == 1) {

            $rows = $crud -> delete($task_id);

            http_response_code(200);

            $response = [
                'data' => $task_id,
                'status' => 200
            ];

        }
        if ($last_insert_id == 0) {

            http_response_code(404);

            $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Risorsa non trovata, questa task non esiste",
                            'details' => $task_id
                        ]
                    ]
                ];
        }   
        echo json_encode($response, JSON_PRETTY_PRINT);
        break;

    #----------POST create✅
    case 'POST':
        $input = file_get_contents('php://input');
     
        // ottengo un array associativo
        $request = json_decode($input, true);

        $task = Task::array_to_task($request);

        try {
            $last_insert_id = $crud -> create($task);
            // cast, lo converto in un array
            $task = (array)$task;

            $task['task_id'] = $last_insert_id;

            $response = [
                'data' => $task,
                'status' => 201
            ];
        } catch (\Throwable $th) {
            http_response_code(422);
            $response = [
                    'errors' => [
                        [
                            'status' => 422,
                            'title' => "Formato non corretto, esiste già una task con questo nome",
                            'details' => $th -> getMessage(),
                            'code' => $th -> getCode()

                        ]
                    ]
                ];
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
        break;

    #----------PUT update✅
    case 'PUT':
        $task_id = filter_input(INPUT_GET, 'task_id');

        $input = file_get_contents('php://input');
        
        $request = json_decode($input, true);

        $task = Task::array_to_task($request);

        $last_insert_id = $crud->update($task, $task_id);

        $task = (array)$task;

        $task['task_id'] = $last_insert_id;
        
            if ($last_insert_id == 1) {
                http_response_code(200);
                $response = [
                    'data' => $task,
                    'status' => 201
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
                            'title' => "Risorsa non trovata, task già modificata",
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