<?php

$conn = new PDO('mysql:host=localhost;dbname=arztpraxis', 'root', '');

if (isset($_POST["svnr"]) && $_POST["svnr"] != "") {
    $temp = explode("/", $_POST["svnr"]);

    $stm = $conn->prepare("SELECT  concat_ws(' bis ', ter_begin, ter_ende) as treatment,
                            concat_ws(' ', per_vname, per_nname) as name,
                            concat_ws('/', per_svnr, per_geburt) as svnr,
                            dia_name as diagnosis
                            FROM person
                            NATURAL JOIN diagnose
                            NATURAL JOIN behandlungszeitraum
                            WHERE per_svnr = ? AND per_geburt = ?");
    $stm->execute(array($temp[0], $temp[1]));
    $behandlungen = $stm->fetchAll(PDO::FETCH_ASSOC);

    print_r($behandlungen);
}

?>

<html lang="de">
<?php include("head.php"); ?>
<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Diagnosen erfassen</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="behandlung.php">Behandlungszeitraum</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">SVNr.</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="svnr" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if (isset($behandlungen) && !empty($behandlungen)) { ?>
            <table class="table">
                <tr>
                    <th>Zeitraum</th>
                    <th>Patient</th>
                    <th>SVNr.</th>
                    <th>Diagnose</th>
                </tr>
                <?php

                    foreach ($behandlungen as $b) {
                        echo "<tr>";
                        echo "<td>$b[treatment]</td>";
                        echo "<td>" . $b["name"] . "</td>";
                        echo "<td>$b[svnr]</td>";
                        echo "<td>$b[diagnosis]</td>";
                        echo "</tr>";
                    }

                ?>
            </table>
        <?php } else { ?>
            <h3>Keine Datensätze vorhanden</h3>
        <?php } ?>
    </div>
</body>
</html>