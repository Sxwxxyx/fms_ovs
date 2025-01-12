<?php 
class Vote_judge {

    //database connection and table name
    private $conn;
    private $table_name = "vote_judge";

    //table properties
    public $admin_std_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    //read a record
    function readone() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE admin_std_id = '" . $this->admin_std_id . "'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

}
?>