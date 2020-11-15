<?php
session_start();

$page_title = "Tuotteet";

include 'config/database.php';

include_once "objects/product.php";
include_once "objects/product_image.php";

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$product_image = new ProductImage($db);

$action = isset($_GET['action']) ? $_GET['action'] : "";

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page = 6;
$from_record_num = ($records_per_page * $page) - $records_per_page;

$page_title = "Tuotteet";

include 'layout_header.php';

echo "<div class='col-md-12'>";
    if($action == 'added') {
        echo "<div class='alert alert-info'>";
            echo "Tuote lisätty koriin!";
        echo "</div>";    
    }

    if ($action == 'exists') {
        echo "<div class='alert alert-info'>";
            echo "Tuote löytyy jo koristasi!";
        echo "</div>";   
    }   
echo "</div>";

$stmt = $product->read($from_record_num, $records_per_page);

$num = $stmt->rowCount();

if ($num > 0) {
    $page_url = "products.php?";
    $total_rows = $product->count();

    include_once "read_products_template.php";
} else {
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>Tuoteita ei löydy.</div>";
    echo "</div>";
}
include 'layout_footer.php';
