<!DOCTYPE html>
<html lang="de">
    <?php include(ROOT_DIR . "/templates/includes/head.php"); ?>
    <body>
        <?php include(ROOT_DIR . "/templates/includes/nav.php"); ?>

        <div class="uk-container">
            <table class="uk-table uk-table-hover uk-table-divider">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Diagnose</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    
                        foreach ($this->data["diagnosis"] as $dia) {
                            echo "<tr>";
                            echo "<td>$dia[dia_id]</td>";
                            echo "<td>$dia[dia_name]</td>";
                            echo "<td><button class='uk-button uk-button-default uk-button-danger' onclick='delete_dia(this)'>Löschen</button></td>";
                            echo "</tr>";
                        }
                    
                    ?>
                </tbody>
            </table>

            <form method="post">
                <fieldset class="uk-fieldset">
                    <div class="uk-margin">
                        <input class="uk-input uk-form-width-medium" type="text" placeholder="Neue Diagnose" name="dia">
                        <button class="uk-button uk-button-default">Speichern</button>
                    </div>
                </fieldset>
            </form>
            <?php if (isset($this->data["dia_exists"]) && $this->data["dia_exists"]) { ?>
                <div class="uk-alert-danger" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>Diagnose existiert bereits.</p>
                </div>
            <?php } ?>
        </div>
    </body>
</html>