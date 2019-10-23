#!/usr/bin/php
<?php
$fichier = file_get_contents($argv[1]);

$fichier = preg_replace($fichier, "#(=\"[\w\s]*\"|\<a(.|\n)*?\<\/a\>)#", $fichier);
$fichier = preg_replace($fichier, "#(\"[\w\s]+\"|>[\w\s.]+<)#", $fichier);
$fichier = preg_replace($fichier, "#[\w\s]+#", $fichier);
$fichier = strtoupper($fichier);
echo $fichier;
echo "\n";
?>
