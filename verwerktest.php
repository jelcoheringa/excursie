<?php
session_start();
require 'config.php';

$filename = $_FILES['file']['name'];
$target_dir = "img/images/";
if ($filename !=''){
    $target_file = $target_dir.basename($_FILES['file']['name']);

    //File extension
    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //Valid file extension
    $extension_arr = array("jpg","jpeg","png","gif");

    //Check extension
    if(in_array($extension,$extension_arr)){
        //Convert to base64
        $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
        $image = "data::image/".$extension. ";base64,".$image_base64;

        //Store image to 'upload' folder
        if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {

            $title = $_POST['posttitle'];
            $text = $_POST['posttext'];
            $userID = $_SESSION['ID'];


            $query = "INSERT INTO posts (`postTitle`,`postText`,`postimage`,`userID`) 
                        VALUES ('$title','$text','$image','$userID')";

            if (mysqli_query($mysqli, $query)) {
                echo "<p>is toegevoegd!</p>";
//                header("location: ../dieren.php");
            } else {
                ?>
                <div class="alert alert-warning" role="alert">
                    <p>Fout bij toevoegen, iets ging mis...</p><br>

                    <?php
                    echo mysqli_error($verbinding);
                    var_dump($query);
                    ?>
                </div>
                <?php
            }
        }else{
            echo "je image was te groot";
        }
    }else{
        echo "er was een error";
    }
}else {
    echo "you cannot upload these images";
}










//session_start();
//$page = "Inschijven";
//include 'config.php';
//include 'head.php';
//include 'navbar.php';
//if (!empty($_POST["posttitle"]) &&
//    !empty($_POST["posttext"]) &&
//    !empty($_POST["image"])) {
//    echo "alles is ingevuld" . "<br>";
//    $title = $mysqli->real_escape_string($_POST['posttitle']);
//    $text = $mysqli->real_escape_string($_POST['posttext']);
//    $image = $_FILES['image']['name'];
//    $target = "img/images/" . basename($image);
//var_dump($image);
////    $filename = $_FILES['image']['name'];
////    $target_dir = "img/";
////    if ($filename !=''){
////        $target_file = $target_dir.basename($_FILES['file']['name']);
//
//
//
//
//
//
//
//    $userID = $_SESSION['ID'];
//
//
//    $sql = " INSERT INTO posts (postTitle, postText, postimage, userID) VALUES (?, ?, ?, ?)";
//    if ($stmt = $mysqli->prepare($sql)) {
//        $stmt->bind_param('ssbi', $title, $text, $image, $userID);
//
//        if ($stmt->execute()) {
//            echo "is gelukt";
//        } else {
//            echo "is mislukt";
//        }
//    } else {
//        echo "zit een fout in de query: " . $mysqli->error;
//    }
//    $mysqli->close();
//    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
//        $msg = "Image uploaded successfully";
//    } else {
//        $msg = "Failed to upload image";
//    }
//}
//
//
//
//
//
//
//
//include 'foot.php';
//


<?php
            $query = "SELECT * FROM posts ORDER BY postID DESC LIMIT 10";
            $resultaat = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_array($resultaat)) {
                ?>
                <div class="card post">
                    <div class="card-header">
                        *user who posted*
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $row['postTitle'] ?></h5>
                        <p class="card-text"><?= $row['postText'] ?></p>
                    </div>
                    <img src="<?= $row['postimage'] ?>" style="width: 70%; margin: 0 auto" class="card-img-top postimg" alt="...">
                    <div class="card-footer text-muted">
                        <?= $row['postDate'] ?>
                    </div>
                </div>
                <?php
            }
            ?>