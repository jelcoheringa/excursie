<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="../"><img src="img/glrlogo.png" id="navlogo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="populair.php">Populair</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="studenten.php">Studenten</a>
                </li>
                <?php
                if (!empty($_SESSION["email"])) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="newPost.php">Posten</a>
                    </li>
                    <li>
                        <a class="nav-link" href="php/loguit.php">loguit</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li><a class="nav-link" href="login.php">login</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>