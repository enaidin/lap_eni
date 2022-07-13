<!DOCTYPE html>
<html lang="de">
    <?php include(ROOT_DIR . "/templates/includes/head.php"); ?>
    <body>
        <?php include(ROOT_DIR . "/templates/includes/nav.php"); ?>
        
        <div class="uk-container">
            <form class="uk-form-horizontal" method="post">
                <fieldset class="uk-fieldset">

                    <legend class="uk-legend">Patienten - Diagnosen</legend>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="svnr">SV-Nr:</label>
                        <div class="uk-form-controls">
                            <input required class="uk-input uk-form-width-medium" type="text" id="svnr" name="svnr" placeholder="XXXX TTMMJJ" value="<?php if (isset($_POST["svnr"])) echo $_POST["svnr"]; ?>">
                        </div>
                    </div>

                    <legend class="uk-legend">Behandlungszeitraum:</legend>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="start">Start:</label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-form-width-medium" type="date" id="start" name="start" value="<?php if (isset($_POST["start"])) echo $_POST["start"]; ?>">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="end">Ende:</label>
                        <div class="uk-form-controls">
                            <input class="uk-input uk-form-width-medium" type="date" id="end" name="end" value="<?php if (isset($_POST["end"])) echo $_POST["end"]; ?>">
                        </div>
                    </div>

                    
                    <div class="uk-margin">
                        <button class="uk-button uk-button-default">Suchen</button>
                    </div>

                </fieldset>
            </form>

            <?php if (isset($this->data["false_format"]) && $this->data["false_format"]) { ?>
                <div class="uk-alert-danger" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>Falsches SVNr.-Format</p>
                </div>
            <?php } ?>

            <?php if (isset($this->data["person"]) && !empty($this->data["person"])) { ?>
                <table class="uk-table uk-table-hover uk-table-divider">
                    <thead>
                        <tr>
                            <th>Zeitraum</th>
                            <th>Patient</th>
                            <th>SVNr</th>
                            <th>Diagnose</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        
                            foreach ($this->data["person"] as $per) {
                                echo "<tr>";
                                echo "<td>$per[treatment]</td>";
                                echo "<td>$per[name]</td>";
                                echo "<td>$per[svnr]</td>";
                                echo "<td>$per[diagnosis]</td>";
                                echo "</tr>";
                            }
                        
                        ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
        
    </body>
</html>