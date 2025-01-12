<?php 
class Major {

    //database connection and table name
    private $conn;
    private $table_name = "majors";

    public function __construct($db) {
        $this->conn = $db;
    }

    //read all records
    function readall() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY major_id";
        $result = mysqli_query($this->conn, $query);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        return json_encode($data);
    }


}

?>