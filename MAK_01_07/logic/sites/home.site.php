<?php

namespace logic\sites;

class Process extends \logic\classes\Main
{

    public function __construct () {
        
        if (isset($_POST["svnr"]) && $_POST["svnr"] != "") {

            // Regex: 4 Ziffern, danach Abstand und anschließend 6 Ziffern
            if (preg_match("/\d{4}\ \d{6}/", $_POST["svnr"])) {

                $svnr = explode(" ", $_POST["svnr"]);
                $date = str_split($svnr[1], 2);

                $query = "  SELECT  concat_ws(' bis ', ter_begin, ter_ende) as treatment,
                                    concat_ws(' ', per_vname, per_nname) as name,
                                    concat_ws('/', per_svnr, per_geburt) as svnr,
                                    dia_name as diagnosis
                            FROM person
                            NATURAL JOIN diagnose
                            NATURAL JOIN behandlungszeitraum
                            WHERE per_svnr = ? AND per_geburt = ?";
                
                $args = array($svnr[0], "19" . implode("-", array_reverse($date)));

                if (isset($_POST["start"]) && $_POST["start"] != "") {
                    $query .= " AND ter_begin >= ?";
                    $args[] = $_POST["start"];
                }

                if (isset($_POST["end"]) && $_POST["end"] != "") {
                    $query .= " AND ter_ende <= ?";
                    $args[] = $_POST["end"];
                }

                $this->data["person"] = self::$db->execute($query, $args);
            }

            else {
                $this->data["false_format"] = true;
            }

        }

        $this->displaySite("home");
        
    }

}