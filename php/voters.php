<?php 
class Voters {

    //database connection and table name
    private $conn;
    private $table_name = "voters";

    //table properties
    public $std_id;
    public $vstatus;
    public $vdate;

    public function __construct($db) {
        $this->conn = $db;
    }

    //read a record
    function readone() {
        $query = "SELECT std_id FROM " . $this->table_name . " WHERE std_id = '" . $this->std_id . "'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    //check vote status
    function check_vstatus() {
        $query = "SELECT std_id FROM " . $this->table_name . " WHERE std_id = '" . $this->std_id . "' AND vstatus = 1";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }
    
    //update vstatus
    function update_vstatus(){
        $query = "UPDATE " . $this->table_name . " SET vstatus = ?, vdate = ? WHERE std_id = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'sss', $this->vstatus, $this->vdate, $this->std_id);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }

    // count all voters
    function votercount() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = mysqli_query($this->conn, $query);
        $cnt = mysqli_num_rows($result);
        return $cnt;
    }

    // count voters by major
    function votercountbymajor() {
        $query = "SELECT major_id, COUNT(*) as mcount FROM " . $this->table_name . " WHERE vstatus = 1 GROUP BY major_id ORDER by major_id";
        $result = mysqli_query($this->conn, $query);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        return json_encode($data);
    }

    // count voters by study year
    function votercountbyyear() {
        $query = "SELECT cyear, COUNT(*) as ycount FROM " . $this->table_name . " WHERE vstatus = 1 GROUP BY cyear ORDER BY cyear";
        $result = mysqli_query($this->conn, $query);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        return json_encode($data);
    }

    // count voters by gender
    function votercountbygender() {
        $query = "SELECT gender, COUNT(*) as gcount FROM " . $this->table_name . " WHERE vstatus = 1 GROUP BY gender ORDER BY gender";
        $result = mysqli_query($this->conn, $query);
        $data = array();
        foreach ($result as $row) {
            $data[] = $row;
        }
        return json_encode($data);
    }

}

?>