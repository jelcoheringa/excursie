<?php

require 'config.php';


$query = "SELECT * FROM posts ORDER BY postID DESC LIMIT 10";

$resultaat = mysqli_query($mysqli, $query);

while ($rij = mysqli_fetch_array($resultaat)){

    $query1 = "SELECT `userFirstname` FROM users WHERE userID = '".$rij['userID']."'";
    $resultaat1 = mysqli_query($mysqli, $query1);
    $profiel = mysqli_fetch_array($resultaat1);
    $query2 = "SELECT COUNT(`postID`) AS `aantalLikes`  FROM likes WHERE postID = '".$rij['postID']."'";
    $resultaat2 = mysqli_query($mysqli, $query2);
    $row = mysqli_fetch_assoc($resultaat2);

    ?>
    <div class="card post">
        <a href="student.php?student=<?= $rij['userID']?>"><div class="card-header">
                <?= $profiel['userFirstname'];?>
            </div></a>
        <div class="card-body">
            <h5 class="card-title"><?= $rij['postTitle'] ?></h5>
            <p class="card-text"><?= $rij['postText'] ?></p>
        </div>
        <img src="<?= $rij['postimage'] ?>" style="width: 70%; margin: 0 auto" class="card-img-top postimg" alt="...">
        <div class="card-footer text-muted">
            <?= $rij['postDate'] ?> Likes: <?= $row['aantalLikes'] ?>
            <button class="likeButton" onclick="liked('<?= $rij['postID'] ?>','<?= $ip ?>')">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                    <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
            </button>
            </svg>
        </div>
    </div>
    <?php

}
