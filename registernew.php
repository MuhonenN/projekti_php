<?php
require_once('functions.php');

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['passwd'];
$password2 = $_POST['passwd2'];

session_start();

try {
    if (!filled_out($_POST)) {
        throw new Exception('Et ole täyttänyt kaikkia kenttiä oikein - palaa takaisin ja yritä uudelleen.');
    }

    if (!valid_email($email)) {
        throw new Exception('Sähköpostiosoite ei kelpaa - palaa takaisin ja yritä uudelleen.');
    }

    if (strlen($password) < 6) {
        throw new Exception('Salasanan pitää olla vähintään 6 merkkiä pitkä - palaa takaisin ja yritä uudelleen.');
    }

    register($username, $email, $password);

    $_SESSION['valid_user'] = $username;

    do_html_header('Rekisteröinti onnistui');
    echo 'Rekisteröinti onnistui. Jatka profiiliisi nähdäksesi tietosi!';
    do_html_url('member.php', 'Jatka');
    do_html_footer();
}
catch (Exception $e) {
    do_html_header('Virhe');
    echo $e->getMessage();
    do_html_footer();
    exit;
}