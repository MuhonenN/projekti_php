<?php
require_once('functions.php');
session_start();
$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM tuotteet WHERE koodi ='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["koodi"] => array('nimi' => $productByCode[0]["nimi"], 'koodi' => $productByCode[0]["koodi"], 'quantity' => $_POST["quantity"], 'hinta' => $productByCode[0]["hinta"], 'kuva' => $productByCode[0]["kuva"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["koodi"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["koodi"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}

if (!isset($_POST['username'])) {
    $_POST['username'] = " ";
}

$username = $_POST['username'];
if (!isset($_POST['password'])) {
    $_POST['passwd'] = " ";
}

$password = $_POST['passwd'];

if ($username && $password) {
    try {
        login($username, $password);
        $_SESSION['valid_user'] = $username;
    } catch (Exception $e) {
        // do_html_header('Virhe');
        // echo 'Et ole kirjautunut sisään.<br> Sinun pitää olla kirjautuneena sisään nähdäksesi tämän sivun.';
        // do_html_url('login.php', 'Login');
    }
}
do_html_navbar();
do_html_header('Ostoskori');
check_valid_user();
if ($username) {
?>
    <style>
        body {
            font-family: Arial;
            color: #211a1a;
            font-size: 0.9em;
        }

        #shopping-cart {
            margin: 40px;
        }

        #product-grid {
            margin: 40px;
        }

        #shopping-cart table {
            width: 100%;
            background-color: #F0F0F0;
        }

        #shopping-cart table td {
            background-color: #FFFFFF;
        }

        .txt-heading {
            color: #211a1a;
            border-bottom: 1px solid #E0E0E0;
            overflow: auto;
        }

        #btnEmpty {
            background-color: #ffffff;
            border: #d00000 1px solid;
            padding: 5px 10px;
            color: #d00000;
            float: right;
            text-decoration: none;
            border-radius: 3px;
            margin: 10px 0px;
        }

        .btnAddAction {
            padding: 5px 10px;
            margin-left: 5px;
            background-color: #efefef;
            border: #E0E0E0 1px solid;
            color: #211a1a;
            float: right;
            text-decoration: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #product-grid .txt-heading {
            margin-bottom: 18px;
        }

        .product-item {
            float: left;
            background: #ffffff;
            margin: 30px 30px 0px 0px;
            border: #E0E0E0 1px solid;
        }

        .product-image {
            height: 155px;
            width: 250px;
            background-color: #FFF;
        }

        .clear-float {
            clear: both;
        }

        .demo-input-box {
            border-radius: 2px;
            border: #CCC 1px solid;
            padding: 2px 1px;
        }

        .tbl-cart {
            font-size: 0.9em;
        }

        .tbl-cart th {
            font-weight: normal;
        }

        .product-title {
            margin-bottom: 20px;
        }

        .product-price {
            float: left;
        }

        .cart-action {
            float: right;
        }

        .product-quantity {
            padding: 5px 10px;
            border-radius: 3px;
            border: #E0E0E0 1px solid;
        }

        .product-tile-footer {
            padding: 15px 15px 0px 15px;
            overflow: auto;
        }

        .cart-item-image {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: #E0E0E0 1px solid;
            padding: 5px;
            vertical-align: middle;
            margin-right: 15px;
        }

        .no-records {
            text-align: center;
            clear: both;
            margin: 38px 0px;
        }
    </style>
    <div id="shopping-cart">
        <div class="txt-heading">Ostoskori</div>

        <a id="btnEmpty" href="basket.php?action=empty">Tyhjennä kori</a>
        <?php
        if (isset($_SESSION["cart_item"])) {
            $total_quantity = 0;
            $total_price = 0;
        ?>
            <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th style="text-align:left">Nimi</th>
                        <th style="text-align:left">Koodi</th>
                        <th style="text-align:right" width="5%">Kappaletta</th>
                        <th style="text-align:right" width="10%">Hinta</th>
                        <th style="text-align:right" width="10%">Yhteensä</th>
                        <th style="text-align:center" width="5%">Poista</th>
                    </tr>
                    <?php
                    foreach ($_SESSION["cart_item"] as $item) {
                        $item_price = $item["quantity"] * $item["hinta"];
                    ?>
                        <tr>
                            <td><img src="<?php echo $item["kuva"]; ?>" class="cart-item-image" /><?php echo $item["nimi"]; ?></td>
                            <td><?php echo $item["koodi"]; ?></td>
                            <td style="text-align:right"><?php echo $item["quantity"]; ?></td>
                            <td style="text-align:right"><?php echo $item["hinta"] . " €"; ?></td>
                            <td style="text-align:right"><?php echo number_format($item_price, 2) . " €"; ?></td>
                            <td style="text-align:center"><a href="basket.php?action=remove&code=<?php echo $item["koodi"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Poista tuote" /></a></td>
                        </tr>
                    <?php
                        $total_quantity += $item["quantity"];
                        $total_price += ($item["hinta"] * $item["quantity"]);
                    }
                    ?>
                    <tr>
                        <td colspan="2" align="right">Yhteensä:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo number_format($total_price, 2) . " €"; ?></strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="right" colspan="10"><a href="checkout.php" class="btn btn-success m-b-10px">
                                <span class="cart-item-image"><img src="icons/cart-check.svg"  alt="" width="24" height="24" title="Maksa"></span>Maksa</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div class="no-records">Ostoskori on tyhjä</div>
        <?php
        }
        ?>
    </div>

    <div id="product-grid">
        <div class="txt-heading">Tuotteet</div>
        <?php
        $product_array = $db_handle->runQuery("SELECT * FROM tuotteet ORDER BY id ASC");
        if (!empty($product_array)) {
            foreach ($product_array as $key => $value) {
        ?>
                <div class="product-item">
                    <form method="post" action="basket.php?action=add&code=<?php echo $product_array[$key]["koodi"]; ?>">
                        <div class="product-image"><img src="<?php echo $product_array[$key]["kuva"]; ?>"></div>
                        <div class="product-title-footer">
                            <div class="product-title"><?php echo $product_array[$key]["nimi"]; ?></div>
                            <div class="product-price"><?php echo "€" . $product_array[$key]["hinta"]; ?></div>
                            <div class="cart-action">
                                <input type="text" class="product-quantity" name="quantity" value="1" size="2" />
                                <input type="submit" value="Lisää koriin" class="btnAddAction" /></div>
                        </div>
                    </form>
                </div>
        <?php
            }
        }
        ?>

    </div>
<?php
}

// do_html_footer();
