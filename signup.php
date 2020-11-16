<?php

$host = "localhost";
$username = "root";
$password = "";
$databasename = "kauppa";

$connect = mysqli_connect($host, $username, $password);
$db = mysqli_select_db($connect, $databasename);

if (isset($_POST['submit_form'])) {
    $email = $_POST["email"];

    mysqli_query($connect, "insert into uutiskirjeet (sahkoposti) values('$email')");

    echo "Thank You For Joining Our Newsletter";
}
?>