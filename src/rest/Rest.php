<?php

class Rest {
    public static $apiEndpoint;

    public static $url = "http://host.docker.internal:5000/";
    public static $option;


    public static function setOption($method, $data){
        if(!is_null($data)){
            static::$option = [
                'http' => [
                    'method' => $method, 
                    'header' => 'Content-Type: application/json', 
                    'content' => json_encode($data),
                ],
            ];
        }else{
            static::$option = [
                'http' => [
                    'method' => $method, 
                    'header' => 'Content-Type: application/json', 
                ],
            ];
        }
        
    }

    public static function setEndpoint($apiEndpoint){
        static::$apiEndpoint = $apiEndpoint;

    }

    public static function call(){
        $context = stream_context_create(static::$option);
        $response = file_get_contents(static::$url . static::$apiEndpoint, false, $context);
        return $response;
    }


}
?>
