<?php
session_start();
$page = "Student";
require 'php/config.php';
include 'php/head.php';
include 'php/navbar.php';
$getID = $_GET['student'];
$query = "SELECT userFirstname, userLastname, userEmail FROM users WHERE userID ='". $getID ."'";
$resultaat = mysqli_query($mysqli, $query);

if (mysqli_num_rows($resultaat) == 0)
{
    echo "<p>Er is geen student met ID: $getID</p>";
}
else {
    $rij = mysqli_fetch_array($resultaat);
}
?>
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-body">
                <p><?= $rij['userFirstname'] ?> <?= $rij['userLastname'] ?></p>
                <p><?= $rij['userEmail'] ?></p>
            </div>
        </div>
        <h2>Posts:</h2>
        <?php
        $query = "SELECT * FROM posts WHERE userID ='". $getID ."'";
        $resultaat = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($resultaat)) {
            $query2 = "SELECT COUNT(`postID`) AS `aantalLikes`  FROM likes WHERE postID = '".$row['postID']."'";
            $resultaat2 = mysqli_query($mysqli, $query2);
            $rij = mysqli_fetch_assoc($resultaat2);
            ?>

            <div class="card post">
                <div class="card-body">
                    <h5 class="card-title"><?= $row['postTitle'] ?></h5>
                    <p class="card-text"><?= $row['postText'] ?></p>
                </div>
                <img src="<?= $row['postimage'] ?>" style="width: 70%; margin: 0 auto" class="card-img-top postimg" alt="...">
                <div class="card-footer text-muted">
                    <?= $row['postDate'] ?> Likes: <?= $rij['aantalLikes'] ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<?php
include 'php/foot.php';