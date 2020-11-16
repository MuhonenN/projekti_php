<?php
session_start();

session_destroy();

$page_title = "Kiitos!";

include_once 'layout_header.php';

echo "<div class='col-md-12'>";
    echo "<div class='alert alert-success'>";
        echo "<strong>Tilauksesi on vastaanotettu!</strong> Kiitos todella paljon!";
    echo "</div>";
echo "</div>";

include_once 'layout_footer.php';
?>