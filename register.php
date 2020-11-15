<?php
require_once('functions.php');
do_html_header('');
do_html_navbar();
?>
<form method="post" action="registernew.php" class="form-control">
    <div class="form-check">
        <h2>Reksiteröidy</h2>

        <p><label for="username">Käyttäjänimi:</label><br>
            <input type="text" name="username" id="username" required></p>

        <p><label for="email">Sähköposti:</label><br>
            <input type="email" name="email" id="email" required></p>

        <p><label for="passwd">Salasana:</label><br>
            <input type="password" name="passwd" id="passwd" required></p>

        <p><label for="passwd2">Toista salasana:</label><br>
            <input type="password" name="passwd2" id="passwd2" required></p>
        
            <button type="submit">Rekisteröidy</button>
    </div>
</form>

<?php
do_html_footer();
?>