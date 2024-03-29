
<?php

use PHPUnit\Framework\TestCase;

require_once "./config.php";

class TaskApiCreateTest extends TestCase{
    //create✅
    /*
    public function test_create_task_api()
    {
        //se voglio svuotare il db ogni volta
        //(new PDO(DB_DSN,DB_USER,DB_PASSWORD))->query("TRUNCATE TABLE task;");
        //$this -> assertEquals()
        //json to php array
        //body della request
        $payload = [
                    "user_id"=> 4,
                    //chiave unica, la prima volta che lo lancio lo inserisce nel Db
                    //la seconda volta da errore
                    "name"=> "Comprare il panettone",
                    "due_date"=> "2023-04-12",
                    "done"=> true,
        ];
        
        $response = $this -> post("http://localhost/corso_php_2223/form_in_php/rest_api/tasks.php", $payload);
        
        //$this -> assertNull($response);
        
        //affermo che la risposta è un json
        $this -> assertJson($response);
        
        //afferma che 1 è uguale a 1
        //$this -> assertEquals(1,1); 
        
        fwrite(STDERR, print_r($response, TRUE));
        
        
    }
    */
    
    public function post(string $url, array $body)
    {
        //curl = client http in linea di comando, command url, usare indirizzo web tramite linea di comando
        $curl = curl_init();
        
        curl_setopt_array($curl, [
            //CURLOPT_URL => "http://localhost/corso_php_2223/form_in_php/rest_api/tasks.php",
            //devo renderlo generico
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            //devo renderlo valido per qualsiasi task
            CURLOPT_POSTFIELDS => json_encode($body),//stringa formato json
            CURLOPT_HTTPHEADER => [
                "Accept: */*",
                "Content-Type: application/json",
                "User-Agent: Thunder Client (https://www.thunderclient.com)"
            ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
    
}


?>
