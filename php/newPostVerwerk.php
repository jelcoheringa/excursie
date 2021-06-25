<?php
session_start();
require 'config.php';

$filename = $_FILES['file']['name'];
$target_dir = "images/";
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
                header("location: ../");
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
        }else{
            echo "je image was te groot";
        }
    }else{
        echo "er was een error";
    }
}else {
    echo "you cannot upload these images";
}
?>