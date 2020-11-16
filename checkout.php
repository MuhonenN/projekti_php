<?php

require_once('functions.php');
session_start();


$database = new DBController();
$db = $database->db_connect();

do_html_navbar();
do_html_header('Maksaminen');
check_valid_user();

if(count($_SESSION['cart_item'])>0) {
    $ids = array();
    foreach($_SESSION['cart_item'] as $id=>$value) {
        array_push($ids, $id);
    }
    $product;
    $stmt=$product->readByIds($ids);

    $total=0;
    $item_count=0;

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $quantity=$_SESSION['cart_item'][$id]['quantity'];
        $sub_total=$price*$quantity;
?>
        <div class="d-table-row">
            <div class="col-md-8">
                <div class="product-title m-b-10px"><h4><?php echo $name ?></h4></div>
                <?php echo $quantity>1 ? "<div> {$quantity} items</div>" : "<div>{$quantity} item</div>"; ?> 
            </div>
            <div class="col-md-4">
                <?php echo "<h4>" . number_format($price, 2, '.', ',') . " €</h4>"; ?>
            </div>
        </div>
<?php
        $item_count += $quantity;
        $total += $sub_total;
    }
?>
    <div class="col-md-12 text-align-center">
        <div class="d-table-row">
            <?php if($item_count>1) {
                echo "<h4 class='m-b-10px'>Yhteensä ({$item_count} tuotetta)</h4>";
            }
            else {
                echo "<h4 class='m-b-10px'>Yhteensä ({$item_count} tuote)</h4>";
            }
            echo "<h4>" . number_format($price, 2, '.', ',') . " €</h4>";
            echo "<a href='placeorder.php' class='btn btn-lg btn-success m-b-10px'>";
            echo "<span class='cart-item-image'><img src='icons/cart-check.svg'  alt='' width='24' height='24' title='Maksa'></span>Maksa</a>";
?>
        </div>
    </div>
<?php
}
else {
?>
    <div class="col-md-12">
        <div class="alert alert-danger">
            Ostoskorisi on tyhjä!
        </div>
    </div>
<?php
}

do_html_footer();

?>