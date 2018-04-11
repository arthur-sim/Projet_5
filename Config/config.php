<?php

return array(
    "db_name" => 'pj5',
    "db_user" => 'root',
    "db_pass" => '',
    "db_host" => 'localhost'
);

/** $afficherErreurs = 1 => erreurs affichées
$afficherErreurs = 0 => erreurs non affichées */
$afficherErreurs = 1;

if ($afficherErreurs === 0) {
  ini_set("display_errors", 0);
  error_reporting(0);
}