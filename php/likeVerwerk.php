<?php
session_start();
require "config.php";

$postID = $_GET['postID'];
$userip = $_GET['ip'];

$query = "INSERT INTO likes (postID, userip) VALUES ('$postID', '$userip')";
if (mysqli_query($mysqli, $query)) {
    echo "<p>is toegevoegd!</p>";
} else {
    ?>
    <div class="alert alert-warning" role="alert">
        <p>Fout bij toevoegen, iets ging mis...</p><br>

        <?php
        echo mysqli_error($mysqli);
        var_dump($query);
        ?>
    </div>
    <?php
}
