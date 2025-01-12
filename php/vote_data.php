<?php 
class Vote_data {

    //database connection and table name
    private $conn;
    private $table_name = "vote_data";

    //table properties
    public $hcode;
    public $vcandidate;
    public $vdate;

    public function __construct($db) {
        $this->conn = $db;
    }

    //add new record
    function create(){
        //write statement
        $stmt = mysqli_prepare($this->conn, "INSERT INTO " . $this->table_name . " (hcode, vcandidate, vdate) VALUES (?,?,?)");
        //bind parameters
        mysqli_stmt_bind_param($stmt, 'sss', $this->hcode, $this->vcandidate, $this->vdate);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }  //create()

    function votecount() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = mysqli_query($this->conn, $query);
        $cnt = mysqli_num_rows($result);
        return $cnt;
    }

    function candidatecount($cand) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE vcandidate = '" . $cand . "'";
        $result = mysqli_query($this->conn, $query);
        $cnt = mysqli_num_rows($result);
        return $cnt;
    }
}

?>