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

    public function insertUser($username, $password, $email, $city, $county) {
        $sql_insert_user = "INSERT INTO user (name, password, email, city, county) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql_insert_user);
        
        if (!$stmt) {
            echo "Error in SQL query: " . $this->conn->error;
            return false;
        }
        
        $stmt->bind_param("sssss", $username, $password, $email, $city, $county);
        
        if ($stmt->execute()) {
            return $stmt->insert_id; // Return the auto-generated user ID
        } else {
            echo "Error executing SQL query: " . $stmt->error;
            return false;
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

    // Method to get the last inserted ID
    public function getLastInsertId() {
        // Get the last inserted ID
        return $this->conn->insert_id;
    }

    // Method to close connection
    public function closeConnection() {
        $this->conn->close();
    } 
}
?>
