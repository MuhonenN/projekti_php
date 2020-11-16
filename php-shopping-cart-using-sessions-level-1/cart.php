<?php
session_start();

include 'config/database.php';

include_once "objects/product.php";
include_once "objects/product_image.php";

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$product_image = new ProductImage($db);

$page_title = "Kori";

include 'layout_header.php';

include 'layout_footer.php';

$action = isset($_GET['action']) ? $_GET['action'] : "";

echo "<div class='col-md-12'>";
    if($action == 'removed') {
        echo "<div class='alert alert-info'>";
            echo "Tuote on poistettu korista!";
        echo "</div>";
    }

    else if($action == 'quantity_updated') {
        echo "<div class='alert alert-info'>";
            echo "Tuotteen määrä päivitetty!";
        echo "</div>";
    }
echo "</div>";

if(count($_SESSION['cart']) > 0) {
    $ids = array();
    foreach($_SESSION['cart'] as $id => $value) {
        array_push($ids, $id);
    }

    $stmt = $product->readByIds($ids);

    $total = 0;
    $item_count = 0;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $quantity = $_SESSION['cart'][$id]['quantity'];
        $sub_total = $price * $quantity;

        echo "<div class='cart-row'>";
            echo "<div class='col-md-8'>";

                echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";

                echo "<form class='update-quantity-form'>";
                    echo "<div class='product-id' style='display:none;'>{$id}</div>";
                    echo "<div class='input-group'>";
                        echo "<input type='number' name='quantity' value='{$quantity}' class='form-control cart-quantity' min='1' />";
                            echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-default update-quantity' type='submit'>Päivitä</button>";
                            echo "</span>";
                    echo "</div>";
                echo "</form>";

                echo "<a href='remove_from_cart.php?id={$id}' class='btn btn-default'>";
                    echo "Poista";
                echo "</a>";
            echo "</div>";

            echo "<div class='col-md-4'>";
                echo "<h4>" . number_format($price, 2, '.', ',') . " €</h4>";
            echo "</div>";
        echo "</div>";

        $item_count += $quantity;
        $total += $sub_total;
    }

    echo "<div class='col-md-8'></div>";
    echo "<div class='col-md-4'>";
        echo "<div class='cart-row'>";
            echo "<h4 class='m-b-10px'>Yhteensä ({$item_count} items)</h4>";
            echo "<h4>" . number_format($total, 2, '.', ',') . " €</h4>";
            echo "<a href='checkout.php' class='btn btn-success m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Siirry maksamaan";
            echo "</a>";
        echo "</div>";
    echo "</div>";
}

else {
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "Korista ei löytynyt yhtään tuotetta!";
        echo "</div>";
    echo "</div>";
}
?>