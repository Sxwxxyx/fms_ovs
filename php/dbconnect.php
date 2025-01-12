<?php
class Database{

    //connect to mysql database
    private $host = "localhost";
    //private $user = "sq20mgtg2";
    private $user = "root";
    //private $passwd = "Sq20T.*836.gth";
    private $passwd = "";
    private $db_name = "fms_ovs_db";
    public $conn;

    // get the database connection
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = mysqli_connect($this->host, $this->user, $this->passwd, $this->db_name);
            //mysqli_query($this->conn, "SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'");
            mysqli_set_charset($this->conn, "utf8");
        }catch(Exception $exception){
            echo "Connection error: " . $exception.getMessage();
        }
        return $this->conn;
    }

    // close connection
    public function closeConnection(){
        mysqli_close($this->conn);
    }
}

?>
