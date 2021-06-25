<?php
session_start();
$page = "Posten";
require 'php/config.php';
include 'php/head.php';
include 'php/navbar.php';

$error = $_SESSION['error'];
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 fotoSide">
            </div>
            <div class="col-md-6">
                <?php
                if (!empty($error)){
                    ?>
                    <div class="card errorBox">
                        <div class="card-body">
                            <p><?= $error ?></p>
                        </div>
                    </div>
                    <?php
                    $_SESSION['error'] = "";
                }
                ?>
                <div class="card newpostbox">
                    <div class="card-body">
                        <form class="px-4 py-3" action="php/newPostVerwerk.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="posttext">Titel:</label>
                                <input type="text" name="posttitle" class="form-control" id="posttitle" placeholder="titel" required>
                            </div>
                            <div class="input-group">
                                <label for="posttext">tekst:</label><br>
                                <textarea class="form-control" aria-label="With textarea" name="posttext" id="posttext" required></textarea>
                            </div>
                            <div class="input-group mb-3">
                                <input type="file" name="file" class="form-control" id="image" />
                            </div>
                            <button type="submit" class="btn btn-primary glrbtn">Posten</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include 'php/foot.php';

