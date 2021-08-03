<?php



 class modelPerusahaan{

    public function __construct()
    {
        
        $this->connection = new connection();

    }

    public function getDataPerusahaan()  
    {
        $obj1 = new connection();
        $query2 = mysqli_query($obj1->getConnection() , "SELECT * FROM perusahaan");
        return $query2;
    }

 }

?>