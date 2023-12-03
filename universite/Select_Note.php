<?php
include "../Connection.php";

$cne=filterRequest("cne");

$stmt=$con->prepare(
"SELECT *
FROM note, etudiant
WHERE note.cne = etudiant.cne AND etudiant.cne = ?");

$stmt->execute(array($cne));
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);

$count=$stmt->rowcount();
if($count>0){
    echo json_encode(array("status"=>"success","data"=>$data));
}else{
    echo json_encode(array("status"=>"error"));
}
?>