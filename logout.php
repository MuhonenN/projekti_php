<?php

require_once('functions.php');
session_start();
$old_user = $_SESSION['valid_user'];

unset($_SESSION['valid_user']);
$result_dest = session_destroy();

do_html_header('Kirjautuminen ulos');

if (!empty($old_user)) {
    if ($result_dest) {
        echo 'Olet kirjautunut ulos.<br>';
        do_html_url('index.php', 'Palaa etusivulle');
    } else echo 'Uloskirjautuminen epäonnistui.<br>';
} else {
    echo 'Et ole kirjautunut sisään, joten sinua ei voi kirjata ulos<br>';
    do_html_url('login.php', 'Kirjaudu Sisään');
}

do_html_footer();
