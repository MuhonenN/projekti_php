<?php
require_once('functions.php');
session_start();

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
    }
    catch (Exception $e) {
        // do_html_header('Virhe');
        // echo 'Et ole kirjautunut sisään.<br> Sinun pitää olla kirjautuneena sisään nähdäksesi tämän sivun.';
        // do_html_url('login.php', 'Login');
    }
}
do_html_navbar();
do_html_header('Oma tilisi');
check_valid_user();
do_html_footer();
