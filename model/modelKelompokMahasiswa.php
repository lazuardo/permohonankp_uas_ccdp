<?php

 

 class modelKelompokMahasiswa{

    public function __construct()
    {
        
        $this->connection = new connection();

    }

    public function getDataKelompok()  
    {
        $query = mysqli_query($this->connection->getConnection(), "SELECT * FROM kelompok_mahasiswa INNER JOIN perusahaan ON kelompok_mahasiswa.id_perusahaan = perusahaan.id_perusahaan INNER JOIN surat ON kelompok_mahasiswa.id_surat = surat.id_surat");
        return $query;
    }

 }

?>