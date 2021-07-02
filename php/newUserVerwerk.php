<?php

$page = "Inschijven";
include 'config.php';
include 'head.php';
include 'navbar.php';
session_start();
if (!empty($_POST["newemail"]) &&
    !empty($_POST["newvoornaam"]) &&
    !empty($_POST["newachternaam"]) &&
    !empty($_POST["newwachtwoord"]) &&
    !empty($_POST["csrfToken"])) {
    echo "alles is ingevuld" . "<br>";
    if (isset($_SESSION["token"]) && $_SESSION["token"] == $_POST["csrfToken"]) {
        echo "token werkt" . "<br>";
        if (filter_var($_POST["newemail"], FILTER_VALIDATE_EMAIL)) {
            echo "email is geldig" . "<br>";
            $glrnl = substr($_POST["newemail"], -7);
            if ($glrnl == "@glr.nl"){
                echo "geldig @glr.nl email." . "<br>";
                $voornaam = $mysqli -> real_escape_string($_POST['newvoornaam']);
                $achternaam = $mysqli -> real_escape_string($_POST['newachternaam']);
                $email = $mysqli -> real_escape_string($_POST['newemail']);
                $wachtwoord = $mysqli -> real_escape_string($_POST['newwachtwoord']);
                $hash = md5( rand(1390,9999) ); //random hash
                $password = rand(1000,6000); //random password
                $userpassword = md5($wachtwoord);
                $NULL = "NULL";


                $sql = " INSERT INTO users (userFirstname, userLastname, userEmail, userPassword, hash) VALUES (?, ?, ?, ?, ?)";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param('ssssi', $voornaam, $achternaam, $email, $userpassword, $hash);

                    $voornaam = $mysqli -> real_escape_string($_POST['newvoornaam']);
                    $achternaam = $mysqli -> real_escape_string($_POST['newachternaam']);
                    $email = $mysqli -> real_escape_string($_POST['newemail']);

                    if ($stmt->execute()) {
                        echo "is gelukt";
                    } else {
                        echo "is mislukt";
                    }
                } else {
                    echo "zit een fout in de query: " . $mysqli->error;
                }
                $mysqli->close();


                $to      = $email;
                $subject = 'Inschijven | Verification';
                $message = '
  
                Gefeliciteerd met inschijven!
                Je acount is aangemaakt, inloggen kan nadat je je acount geactiveerd hebt door op onderstaande link te klikken.
                  
                ------------------------
                Naam: '.$voornaam.' '.$achternaam.'
                Wachtwoord: '.$password.'
                ------------------------
                  
                Klik alsjeblieft op onderstaande link voor activeren:
                http://excursie.4260.nl/php/verify.php?email='.$email.'&hash='.$hash.'
                  
                ';
                $headers = 'From:noreply@4260.nl' . "\r\n"; // Set from headers
                mail($to, $subject, $message, $headers);



                $_SESSION['error'] = "Aanmaken is gelukt. Klik op link in je mail om je account te activeren.";
                header("location: ../newUser.php");
            } else {
                $_SESSION['error'] = "Geen geldig @glr.nl email.";
                header("location: ../newUser.php");
            }
        } else {
            $_SESSION['error'] = "Geen geldig mail adres.";
            header("location: ../newUser.php");
        }
    } else {
        $_SESSION['error'] = "Er ging iets fout.";
        header("location: ../newUser.php");
    }
} else {
    $_SESSION['error'] = "Niet alles is ingevuld!";
    header("location: ../newUser.php");
}
include 'foot.php';
