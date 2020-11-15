<?php
class Product {

    private $conn;
    private $table_name = "products";

    public $id;
    public $name;
    public $price;
    public $description;
    public $category_id;
    public $category_name;
    public $timestamp;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read($from_record_num, $records_per_page) {
        $query = "SELECT
                        id, name, description, price
                    FROM
                        " . $this->table_name . "
                    ORDER BY
                        created DESC
                    LIMIT
                        ?, ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $stmt->execute();

        return $stmt;
    }

    public function count() {
        $query = " SELECT count(*) FROM " . $this->table_name;

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $rows = $stmt->fetch(PDO::FETCH_NUM);

        return $rows[0];
    }
}
