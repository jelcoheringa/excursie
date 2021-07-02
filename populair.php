<?php
session_start();
$page = "Populair";
require 'php/config.php';
include 'php/head.php';
include 'php/navbar.php';
?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 fotoSide">
            </div>
            <div class="col-md-6" id="populair">

            </div>
        </div>
    </div>

<?php
include 'php/foot.php';