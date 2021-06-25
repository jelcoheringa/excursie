<?php
$page = "Activeren";
include 'config.php';
include 'head.php';
include 'navbar.php';
session_start();
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = $mysqli -> real_escape_string($_GET['email']);
    $hash = $mysqli -> real_escape_string($_GET['hash']);
    $search = mysqli_query($mysqli, "SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."'");
    $resultaat = mysqli_query($mysqli, $search);
    if (mysqli_num_rows($resultaat) > 0)
    {
        $user = mysqli_fetch_array($resultaat);
        echo $user['email'];
    }
//    $match  = mysqli_stmt_num_rows($search);
    echo $result;
} else {
    // Invalid approach
}


//or die(mysqli_error())
include 'foot.php';
?>