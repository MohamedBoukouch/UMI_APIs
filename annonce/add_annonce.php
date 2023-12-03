<?php
include "../Connection.php";

$titel = filterRequest("titel");
$description = filterRequest("description");
$date=$date=date("Y/m/d");
$files=imageUpload("file");


$stmt=$con->prepare("
INSERT INTO `annonce` (`titel`,`description`,`date`,`files`)
VALUES(?,?,?,?)
");

$stmt->execute(array($titel,$description,$date,$files));

$count=$stmt->rowcount();
if($count>0){
    
    echo json_encode(array("status"=>"success"));
 
}else{
    echo json_encode(array("status"=>"error"));
}
?>