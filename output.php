<?php

function do_html_header($title) {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="jquery/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <title><?php echo $title ?></title>
        <style>
            footer {
                text-align: center;
                bottom: 0;
                position: absolute;
                width: 100%;
                background-color: #f2f2f2;
                padding: 25px
            }

            .text-uppercase {
                letter-spacing: 0.1em
            }
        </style>
    </head>

    <body>
        <?php
        if ($title) {
            do_html_heading($title);
        }
    }

    function do_html_footer() {
        ?>
        <footer class="footer">
            <form class="form-inline" style="display: inherit">
                <input type="email" class="form-control" size="40" placeholder="Sähköposti">
                <button type="button" class="btn btn-danger">Tilaa uutiskirje</button>
            </form><br>
            <p>Se Oikea Kauppa Copyright</p>
        </footer>
    </body>

    </html>
<?php
    }

    function do_html_heading($heading) {
?>
    <h2><?php echo $heading; ?></h2>
<?php
    }

    function do_html_navbar() {
?>

    <body>
        <div class="jumbotron text-center" style="margin-bottom: 0">
            <h1>Se Oikea Kauppa</h1>
            <p>Resize this responsive page to see the effect!</p>
        </div>

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
            <a class="navbar-brand" href="index.php">SOK</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a class="nav-link" href="login.php"><img src="icons/person-circle.svg" alt="" width="24" height="24" style="vertical-align: bottom" title="Sinun tilisi"> Sinun tilisi</a>
                    </li>
                    <li>
                        <a class="nav-link" href="basket.php"><img src="icons/bag.svg" alt="" width="24" height="24" style="vertical-align: bottom" title="Ostoskori"> Ostoskori</a>
                    </li>
                </ul>
            </div>
        </nav>
    <?php
    }
    ?>