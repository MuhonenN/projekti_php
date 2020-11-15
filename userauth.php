<?php

require_once('connectdb.php');

function register($username, $email, $password)
{
    $conn = db_connect();
    $result = $conn->query("select 1 from kayttajat where kayttajanimi = '$username'");

    if (!$result) {
        throw new Exception('Toimintoa ei pysty suorittaa');
    }

    if ($result->num_rows > 0) {
        throw new Exception('Käyttäjänimi on jo käytössä - palaa takaisin ja valitse toinen nimi.');
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $result = $conn->query("insert into kayttajat (kayttajanimi, sahkoposti, salasana) values ('$username', '$email', '$password_hash')");

    if (!$result) {
        throw new Exception('Rekisteröinti epäonnistui - yritä uudelleen myöhemmin.');
    }
    return true;
}

function login($username, $password)
{
    $conn = db_connect();

    $result = $conn->query("select salasana from kayttajat where kayttajanimi = '$username'");

    if (!$result) {
        throw new Exception('Kirjautuminen epäonnistui.');
    }

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_row($result);
        $password_verify = password_verify($password, $row[0]);
        if ($password_verify) {
            return true;
        }
    } else {
        throw new Exception('Kirjautuminen epäonnistui');
    }
}

function check_valid_user()
{
    if (isset($_SESSION['valid_user'])) {
        echo "Olet kirjautuneena " . $_SESSION['valid_user'] . ".<br>";
    } else {
        do_html_header('Virhe');
        echo 'Et ole kirjautunut sisään.<br>';
        do_html_url('login.php', 'Kirjautuminen');
        do_html_footer();
        exit;
    }
}
