<?php

class baseController {
    public function __construct()    
    {
       require('connection.php');
       session_start();
       
    }

    public function base_url($parameter = ""){
        return "http://localhost:8080/permohonankp/index.php/".$parameter;
    }

    public function url_assets(){
        return "http://localhost:8080/permohonankp/assets/";
    }
}