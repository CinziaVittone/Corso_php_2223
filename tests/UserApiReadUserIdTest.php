<?php

use PHPUnit\Framework\TestCase;

require_once "./config.php";

class UserApiReadUserIdTest extends TestCase{
    //read_user_id✅
    /*
    public function test_read_user_id_user_api()
    {
        //$this -> assertEquals()
        //json to php array
        //body della request
        $payload = [
        ];
        
        $response = $this -> get("http://localhost/corso_php_2223/form_in_php/rest_api/users.php?user_id=4", $payload);
        
        //$this -> assertNull($response);
        
        //affermo che la risposta è un json
        $this -> assertJson($response);
        
        //afferma che 1 è uguale a 1
        //$this -> assertEquals(1,1); 
        
        fwrite(STDERR, print_r($response, TRUE));     
    }
    */
    
    public function get(string $url, array $body)
    {
        //curl = client http in linea di comando, command url, usare indirizzo web tramite linea di comando
        $curl = curl_init();

        curl_setopt_array($curl, [
        //devo renderlo generico
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        //devo renderlo valido per qualsiasi utente
        CURLOPT_POSTFIELDS => json_encode($body),//stringa formato json,
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