<?php

function do_html_header($title)
{
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

            #newsletter_form {
                display: none;
                width: 100%;
                height: 100%;
                background-color: #0080FF;
                text-align: center;
                padding-top: 150px;
            }

            #newsletter_form #user_name {
                margin-top: 20px;
                width: 20%;
                height: 50px;
                padding-left: 20px;
                border: none;
                font-size: 17px;
            }

            #newsletter_form #email {
                margin-top: 20px;
                width: 50%;
                height: 50px;
                padding-left: 20px;
                border: none;
                font-size: 17px;
            }

            #newsletter_form input[type="submit"] {
                margin-top: 10px;
                width: 35%;
                height: 50px;
                border: none;
                background-color: #084B8A;
                color: white;
                font-size: 22px;
                cursor: pointer;
            }

            #newsletter_form input[type="button"] {
                margin-top: 10px;
                width: 35%;
                height: 50px;
                border: none;
                background-color: #FE2E2E;
                color: white;
                font-size: 22px;
                cursor: pointer;
            }
        </style>
    </head>

    <body>
        <?php
        if ($title) {
            do_html_heading($title);
        }
    }

    function do_html_footer()
    {
        ?>
        <footer class="footer">
            <h3 class="text-uppercase">Tilaa uutiskirje</h1>
            <form action="signup.php" method="post">
                    <!-- class="form-inline" style="display: inherit" -->
                    <input class="text-center" type="email" id="email" name="email" placeholder="SÄHKÖPOSTI">
                    <!-- class="form-control" size="40" -->
                <button class="btn btn-primary" type="submit" value="Subscribe" name="submit_form">Lähetä</button>
                <!-- Tilaa uutiskirje class="btn btn-danger" -->

            </form><br>
            <div id="wrapper">
                Se Oikea Kauppa Copyright
            </div>
        </footer>
    </body>

    </html>
<?php
    }

    function do_html_heading($heading)
    {
?>
    <h2><?php echo $heading; ?></h2>
<?php
    }

    function do_html_url($url, $name)
    {
?>
    <br><a href="<?php echo $url; ?>"><?php echo $name; ?></a><br>
<?php
    }

    function do_html_navbar()
    {
?>

    <body>
        <div class="jumbotron text-center" style="margin-bottom: 0">
            <h1>Se Oikea Kauppa</h1>
            <p>Osta tai älä osta</p>
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
                        <a class="nav-link" href="member.php"><img src="icons/person-circle.svg" alt="" width="24" height="24" style="vertical-align: bottom" title="Kirjaudu Rekisteröidy">
                            <div style="display: inline"><?php if (!empty($_SESSION['valid_user'])) {
                                                                echo $_SESSION['valid_user'];
                                                            } else echo "Kirjaudu"; ?>
                            </div>
                        </a>
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