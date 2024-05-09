<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "eslamiat";
    private $conn;

    // Constructor to establish connection
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }


    // Method to execute query
    public function insert($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = "'" . implode("', '", $data) . "'";
        $sql = "INSERT INTO $table ($columns) VALUES ($values)";
        return $this->executeQuery($sql);
    }

    public function delete($table, $condition) {
        $sql = "DELETE FROM $table WHERE $condition";
        return $this->executeQuery($sql);
    }

    public function update($table, $data, $condition) {
        $updates = [];
        foreach ($data as $key => $value) {
            $updates[] = "$key = '$value'";
        }
        $updates = implode(', ', $updates);
        $sql = "UPDATE $table SET $updates WHERE $condition";
        return $this->executeQuery($sql); 
    }

    public function select($table, $columns = '*', $condition = '') {
        $sql = "SELECT $columns FROM $table";
        if ($condition !== '') {
            $sql .= " WHERE $condition";
        }
        return $this->executeQuery($sql);
    }

    public function executeQuery($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die("Error in preparing statement: " . $this->conn->error);
        }
        if ($params) {
            $stmt->bind_param(str_repeat("s", count($params)), ...$params);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function getAffectedRows() {
        return $this->conn->affected_rows;
    }


    // Method to close connection
    public function closeConnection() {
        $this->conn->close();
    } 
}
?>
