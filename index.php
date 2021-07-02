<?php
session_start();
$page = "Home";
require 'php/config.php';
include 'php/head.php';
include 'php/navbar.php';
$_SESSION['error'] = "";
$ip = $_SERVER['REMOTE_ADDR'];
?>

<div class="container">
    <div class="row">
        <div id="Posts" class="col-md-8">

        </div>
        <div class="col-md-4">
            <div class="list-group" style="width: 100%; margin-bottom: 1em">
            <?php
            $query = "SELECT * FROM users ORDER BY userID DESC LIMIT 10";
            $resultaat = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_array($resultaat)) {
            ?>
                <a href="student.php?student=<?= $row['userID']?>" style="max-width: 80%" class="list-group-item list-group-item-action"><?= $row['userFirstname'] ?> <?= $row['userEmail'] ?></a>
                <?php
            }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'php/foot.php';