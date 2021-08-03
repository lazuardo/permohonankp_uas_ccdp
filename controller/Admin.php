<?php

    class Admin extends baseController{

        public function __construct($method){
            $this->$method();
        
        }

        public function menuAdmin()
        {
            require('model/modelKelompokMahasiswa.php');
            $obj1 = new modelKelompokMahasiswa();
            $dataKelompokMahasiswa = $obj1->getDataKelompok();

            require('model/modelPerusahaan.php');
            $obj2 = new modelPerusahaan();
            $dataPerusahaan = $obj2->getDataPerusahaan();
            
            include('view/viewAdmin.php');
            
        }
    }

?>