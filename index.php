<!DOCTYPE html>
<html lang="en">

<head>
    <title>Se Oikea Kauppa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <style>
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        .text-uppercase {
            letter-spacing: 0.1em;
        }
    </style>
</head>

<body>
    <div class="jumbotron text-center" style="margin-bottom: 0">
        <h1>Ensimmäinen bootstrap sivu</h1>
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

    <div style="height: 300px"></div>

    <footer class="container-fluid text-center">
        <div class="bg-gray-100 text-dark-700 py-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" style="display: flex;justify-content: center;align-items: center;border-right: 1px solid #495057;text-align: left;padding-top: 0;padding-bottom: 0;flex: 0 0 33.33333%;max-width: 33.33333%">
                        <div style="width: 48px; height: 48px">
                            <img src="icons/truck.svg" alt="" width="45" height="39" title="Toimitus">
                            <div>
                                <h6 class="text-uppercase">Ilmainen kotiinkuljetus & palautus</h6>
                                <p class="text-muted font-weight-light text-sm mb-0">Ilmainen kotiinkuljetus yli 100€ ostoksille</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" style="display: flex;justify-content: center;align-items: center;border-right: 1px solid #495057;text-align: left;padding-top: 0;padding-bottom: 0;flex: 0 0 33.33333%;max-width: 33.33333%">
                        <div style=" width: 48px; height: 48px">
                            <img src="icons/cash.svg" alt="" width="45px" height="45px" title="Toimitus">
                            <h6 class="text-uppercase">Reklamaatio takuu</h6>
                            <p class="text-muted font-weight-light text-sm mb-0">30 päivän rahat takaisin takuu</p>
                        </div>
                    </div>
                    <div class="col-lg-4" style="display: flex;justify-content: center;align-items: center;border-right: 1px solid #495057;text-align: left;padding-top: 0;padding-bottom: 0;flex: 0 0 33.33333%;max-width: 33.33333%">
                        <div style=" width: 48px; height: 48px">
                            <img src="icons/telephone.svg" alt="" width="45px" height="45px" title="Toimitus">
                            <h6 class="text-uppercase">020-100-003</h6>
                            <p class="text-muted font-weight-light text-sm mb-0">Asiakaspalvelu kellon ympäri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <footer>
            <p>Se Oikea Kauppa Copyright</p>
            <form class="form-inline" style="display: inherit"><label>Get deals:</label>
                <input type="email" class="form-control" size="50" placeholder="Email Address">
                <button type="button" class="btn btn-danger">Sign Up</button>
            </form>
        </footer>
</body>

</html>