<?php

$exists = false;
$conn = new PDO('mysql:host=localhost;dbname=arztpraxis', 'root', '');

$stm = $conn->prepare("SELECT dia_id, dia_name FROM diagnose");
$stm->execute();
$diagnosis = $stm->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["diagnose"]) && $_POST["diagnose"] != "") {
    if (!in_array($_POST["diagnose"], array_column($diagnosis, "dia_name"))){
        $stm = $conn->prepare("INSERT INTO diagnose(dia_name) VALUES(?)");
        $stm->execute(array($_POST["diagnose"]));

    }
    else {
        $exists = true;
    }

}

$stm = $conn->prepare("SELECT dia_id, dia_name FROM diagnose");
$stm->execute();

?>

<html lang="de">
<?php include("head.php"); ?>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Diagnosen erfassen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="behandlung.php">Behandlungszeitraum</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <h2>Diagnose erfassen</h2>
        <h3>Bestehende Diagnosen</h3>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Diagnose</th>
            </tr>
            <?php
            
                while ($row = $stm->fetch()) {
                    $style = "";
                    if (isset($_POST["diagnose"]) && $_POST["diagnose"] == $row["dia_name"])
                        $style = "style='background-color: red'";
                    echo "<tr $style>";
                    echo "<td>$row[dia_id]</td>";
                    echo "<td>$row[dia_name]</td>";
                    echo "</tr>";
                }
            
            ?>
        </table>
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Diagnose</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="diagnose" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if ($exists) { ?>
            <div class="alert alert-danger" role="alert">
                Diagnose existiert bereits.
            </div>
        <?php } ?>
    </div>

    <script src="bootstrap.bundle.min.js"></script>
</body>
</html>