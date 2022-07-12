<?php

$conn = new PDO('mysql:host=localhost;dbname=arztpraxis', 'root', '');


?>

<html lang="de">
    <?php include("head.php"); ?>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Nav1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="behandlung.php">Nav2</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        
    </div>

    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>