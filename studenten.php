<?php
session_start();
$page = "Home";
require 'php/config.php';
include 'php/head.php';
include 'php/navbar.php';
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 fotoSide">
            </div>
            <div class="col-md-6">
                <div class="list-group" style="max-width: 80%">
                    <?php
                    $query = "SELECT * FROM users ORDER BY userID DESC";
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