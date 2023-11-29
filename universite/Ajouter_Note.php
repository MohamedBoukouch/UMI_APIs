<?php
include "../Connection.php";

$resultat = filterRequest("resultat");
$status = filterRequest("status");
$cne = filterRequest("cne");
$nom_matier = filterRequest("nom_matier");

$stmt = $con->prepare("
    INSERT INTO `note` (`resultat`, `status`,`cne`,`nom_matier`)
    VALUES (?,?,?,?)
");

$stmt->execute(array($resultat, $status,$cne,$nom_matier));

$count = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "Success"));
} else {
    echo json_encode(array("status" => "error"));
}
?>
