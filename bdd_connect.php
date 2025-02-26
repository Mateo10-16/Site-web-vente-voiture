<?php
define ('SERVER', "mysql-ventevoiturephysique.alwaysdata.net");
define ('LOGIN', "398110_1");
define ('MDP', "Tbdj64s@CK3");
define ('BDD', "ventevoiturephysique_1");

if (!function_exists('validation_donnees')) {
    function validation_donnees($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>
