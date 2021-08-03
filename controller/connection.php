<?php

class connection{

    protected $host = "localhost";
    protected $user = "root";
    protected $password = "";
    protected $database = "permohonankp";
    public $instance;
    
    public function getConnection()
    {
        $koneksi=mysqli_connect($this->host, $this->user, $this->password, $this->database);

        return $koneksi;
    }
    
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new connection();
        }

        return self::$instance;
    }
}


