<?php
require_once('output.php');
do_html_header('');
do_html_navbar();
?>
<form method="post" action="isanpaiva.php" class="form-control"> 
    <div>
        <h2>Kirjaudu</h2>
        <p><label for="username">Käyttäjätunnus:</label><br>
            <input type="text" name="username" id="username"></p>
        <p><label for="passwd">Salasana:</label><br>
            <input type="password" name="passwd" id="passwd"></p>
        <button type="submit">Kirjaudu</button><br><br>
        <p><a href="forgot_form.php">Unohtuiko käyttäjätunnus tai salasana?</a></p>
        <p><a href="register.php" class="text-uppercase">Luo tunnus</a></p>
    </div>
</form>

<?php
do_html_footer();
?>