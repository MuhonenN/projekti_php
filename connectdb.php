<?php
class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "kauppa";
    private $conn;

    function __construct() {
        $this->conn = $this->db_connect();
    }

    function db_connect() {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }

    function runQuery($query) {
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if (!empty($resultset)) return $resultset;
    }

    function numRows($query) {
        $result = mysqli_query($this->conn, $query);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }
}

function db_connect() {
    $result = new mysqli('localhost', 'root', '', 'kauppa');
    if (!$result) {
        throw new Exception('Could not connect ot database server');
    } else {
        return $result;
    }
}
