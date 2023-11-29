<?php
include "../Connection.php";

$cne = filterRequest("cne");

$stmt=$con->prepare("SELECT * FROM etudiant WHERE cne=?");
//$stmt=$con->prepare("SELECT * FROM etudiant");
$stmt->execute(array($cne));
$stmt->execute();



$count=$stmt->fetchAll(PDO::FETCH_ASSOC);

if($count>0){
    echo json_encode(array("status"=>"success","data"=>$count));
}else{
    echo json_encode(array("status"=>"error"));
}

?>