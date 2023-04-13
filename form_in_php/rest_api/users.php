<?php
// ../esco da rest_api ../esco da form_in_php , sono fuori a tutto e trovo config

use crud\UserCRUD;
use models\User;

include "../config1.php";
include "../autoload.php";

$crud = new UserCRUD;

switch ($_SERVER['REQUEST_METHOD']) {
    
    #----------GET read_all, read_by_user_id✅
    case 'GET':
        $user_id = filter_input(INPUT_GET,'user_id');
        
        //user_id
        if(!is_null($user_id)){
            $users = $crud->read_by_user_id($user_id);
            if($users == false){
                $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Risorsa non trovata, user_id non esistente",
                            'details' => $user_id
                        ]
                    ]    
                    ];
                echo json_encode($response, JSON_PRETTY_PRINT);
            }else{
                http_response_code(200);

                $response = [
                    'data' => $users,
                    'status' => 200
                ];
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        //all
        }else{
            $users = $crud->read_all();

            $response = [
                'data' => $users,
                'status'=>200
            ]; 
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
        break;

        #----------DELETE delete✅
    case 'DELETE':
        $user_id = filter_input(INPUT_GET, 'user_id');

        $input = file_get_contents('php://input');
        
        $last_insert_id = $crud->delete($user_id);

        $user['user_id'] = $last_insert_id;

        if ($last_insert_id == 1) {

            $rows = $crud -> delete($user_id);

            http_response_code(200);

            $response = [
                'data' => $user_id,
                'status' => 200
            ];

        }
        if ($last_insert_id == 0) {

            http_response_code(404);

            $response = [
                    'errors' => [
                        [
                            'status' => 404,
                            'title' => "Risorsa non trovata, questo utente non esiste",
                            'details' => $user_id
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

        $user = User::array_to_user($request);

        try {
            $last_insert_id = $crud -> create($user);
            // cast, lo converto in un array
            $user = (array)$user;
            // unset()annulla gli indici di un array, non restituisco queste parti
            unset($user['password']);
            $user['user_id'] = $last_insert_id;

            $response = [
                'data' => $user,
                'status' => 201
            ];
        } catch (\Throwable $th) {
            http_response_code(422);
            $response = [
                // proprietà errors
                // 'chiave' => "valore"
                    'errors' => [
                        [
                            'status' => 422,
                            'title' => "Formato non corretto, esiste gia' uno user con questo username",
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
                http_response_code(200);
                $response = [
                    'data' => $user,
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
                            'title' => "Risorsa non trovata, utente gia' modificato",
                            'details' => $user_id
                        ]
                    ]
                ];
            }
            //risposta va convertita in formato json
            echo json_encode($response, JSON_PRETTY_PRINT);
        break;
}