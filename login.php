<?php
session_start();
$page = "Login";
require 'php/config.php';
include 'php/head.php';
include 'php/navbar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 fotoSide">
        </div>
        <div class="col-md-6">
            <div class="card loginBoxDiv">
                <div class="card-body">
                    <form class="px-4 py-3" method="post">
                        <div class="form-group">
                            <label for="userEmail">Email address</label>
                            <input type="email" name="userEmail" class="form-control" id="userEmail" placeholder="email@glr.nl">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="******">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </form>
                    <div class="dropdown-divider" style="display: "></div>
                    <a href="newUser.php" class="dropdown-item" href="" style="display: ">Nieuw hier? Schijf in!</a>
                </div>
                <?php

                if (isset($_POST['submit']))
                {
                    $email = $_POST['userEmail'];
                    $password = md5($_POST['password']);

                    $query = "SELECT * FROM users WHERE userEmail = '$email' AND userPassword = '$password' AND active = 1";

                    $resultaat = mysqli_query($mysqli, $query);

                    if (mysqli_num_rows($resultaat) > 0)
                    {
                        //echo "<p>$Gebruikersnaam, u bent ingelogd!</p>";
                        $user = mysqli_fetch_array($resultaat);

                        $_SESSION['ID'] = $user['userID'];
                        $_SESSION['email'] = $user['userEmail'];
                        $_SESSION['role'] = $user['userRole'];
                        ?>
                        <div class="alert alert-success" role="alert">
                            <p>je bent ingelogd.</p><br>
                            <p><?= $_SESSION['email'] ?></p>
                        </div>
                        <?php
                        header("location: ../");
                    }
                    else
                    {
                        ?>
                        <div class="alert alert-warning" role="alert">
                            <p>Email and/or password is incorect.</p>
                            <p>Try again</p>
                            <a class="dropdown-item" href="forgotPassword.php" style="display: none">Forgot password?</a>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>


<?php
include 'php/foot.php';