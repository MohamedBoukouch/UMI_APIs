<?php
include "../Connection.php";

$nom_matiere = filterRequest("nom_matiere");
$nom_prof = filterRequest("nom_prof");

$stmt = $con->prepare("
    INSERT INTO `matier` (`nom_matier`, `prof_matiere`)
    VALUES (?, ?)
");

$stmt->execute(array($nom_matiere, $nom_prof));

$count = $stmt->rowCount();  // Corrected typo: 'rowcount' should be 'rowCount'

if ($count > 0) {
    echo json_encode(array("status" => "Success"));
} else {
    echo json_encode(array("status" => "error"));
}
?>
