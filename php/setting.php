<?php 
class Setting {

    //database connection and table name
    private $conn;
    private $table_name = "settings";

    //table properties
    public $vote_status;
    public $show_result;
    public $updated_date;

    public function __construct($db) {
        $this->conn = $db;
    }

    //read a record
    function read_vote_status() {
        $query = "SELECT vote_status FROM " . $this->table_name;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row['vote_status'];
    }

    //read a record
    function read_show_result() {
        $query = "SELECT show_result FROM " . $this->table_name;
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row['show_result'];
    }

    //update vote_status
    function update_vote_status(){
        $query = "UPDATE " . $this->table_name . " SET vote_status = ?, updated_date = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ss', $this->vote_status, $this->updated_date);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }

    //update vote_status
    function update_show_result(){
        $query = "UPDATE " . $this->table_name . " SET show_result = ?, updated_date = ?";
        // statement
        $stmt = mysqli_prepare($this->conn, $query);
        // bind parameters
        mysqli_stmt_bind_param($stmt, 'ss', $this->show_result, $this->updated_date);

        /* execute prepared statement */
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            return false;
        }
    }

}
?>