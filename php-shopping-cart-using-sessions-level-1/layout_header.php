<?php
$_SESSION['cart'] = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title><?php echo isset($page_title) ? $page_title : "Se Oikea Kauppa"; ?></title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="libs/css/custom.css" />
</head>

<body>
    <?php include 'navigation.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1><?php echo isset($page_title) ? $page_title : "Se Oikea Kauppa"; ?></h1>
                </div>
            </div>