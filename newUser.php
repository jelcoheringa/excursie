<?php
session_start();
$page = "Inschijven";
require 'php/config.php';
include 'php/head.php';
include 'php/navbar.php';

$error = $_SESSION['error'];
$token = bin2hex(openssl_random_pseudo_bytes(32));
$_SESSION['token'] = $token;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 fotoSide">
        </div>
        <div class="col-md-6">
            <?php
            if (!empty($error)){
                ?>
                <div class="card errorBox">
                    <div class="card-body">
                        <p><?= $error ?></p>
                    </div>
                </div>
                <?php
                $_SESSION['error'] = "";
            }
            ?>
            <div class="card loginBoxDiv">
                <div class="card-body">
                    <form class="px-4 py-3" action="php/newUserVerwerk.php" method="post">
                        <div class="form-group">
                            <label for="newemail">Email-adres:</label>
                            <input type="email" name="newemail" class="form-control" id="newemail" placeholder="email@glr.nl" required>
                            <input type="hidden" name="csrfToken" value="<?= $token ?>">
                        </div>
                        <div class="form-group">
                            <label for="newvoornaam">Voornaam:</label>
                            <input type="text" name="newvoornaam" class="form-control" id="newvoornaam" placeholder="Piet" required>
                        </div>
                        <div class="form-group">
                            <label for="newachternaam">Achternaam:</label>
                            <input type="text" name="newachternaam" class="form-control" id="newachternaam" placeholder="De Jong">
                        </div>
                        <div class="form-group">
                            <label for="newwachtwoord">Wachtwoord:</label>
                            <input type="password" name="newwachtwoord" class="form-control" id="newwachtwoord" placeholder="Password" required>
                        </div>
                        <button type="submit" class="btn btn-primary glrbtn">Inschrijven</button>

                    </form>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.php">Al een account? Login</a>
                    <button class="dropdown-item" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">Info inschrijven</button>
                </div>
            </div>
            <div class="offcanvas offcanvas-bottom" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
                <div class="offcanvas-header">
                    <h3 class="offcanvas-title" id="offcanvasBottomLabel">Inschrijven excursie GLR</h3>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body small">
                    <p>Dit is een platform voor iedereen die wil weten over een excursie, maar het plaatsen van iets is uitsluitend alleen voor GLR studenten en medewerkers.</p>
                    <p>In verband hiermee kan je alleen een account aanmaken als je toegang hebt tot een acount bij het GLR en dus een '@glr.nl' e-mailadres.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'php/foot.php';

