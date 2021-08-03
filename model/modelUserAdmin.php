<?php



 class modelUserAdmin{

    public function __construct()
    {
        
        $this->connection = new connection();

    }

    public function checkUserAdmin($username,$password)  
    {
        $query = mysqli_query($this->connection->getConnection(), "SELECT * FROM user_admin WHERE username='$username'");
        return $query;
    }

 }

?>