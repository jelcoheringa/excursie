<?php
// database logingegevens
$db_hostename = 'localhost'; // of '127.0.0.1'
$db_username = 'beroeps26';
$db_password = '4Eelp33?';
$db_database = 'beroeps26';

$verbinding = mysqli_connect($db_hostename, $db_username, $db_password, $db_database);

if (!$verbinding) {

    echo "FOUT: geen connectie naar database. <br>";
    echo "Errno: " . mysqli_connect_errno() . "<br>";
    echo "Error: " . mysqli_connect_error() . "<br>";
    exit;

}

error_reporting(E_ALL);
ini_set('display_errors', '1');